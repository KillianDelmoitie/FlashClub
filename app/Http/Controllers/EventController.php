<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\DJ;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function index()
    {
        $djs = DJ::orderBy('priority', 'desc')->get();
        $events = Event::orderBy('date', 'asc')->get();
        return view('loggedIn.eventmanaging', [
            'events' => $events,
            'djs' => $djs
        ]);
    }

    public function events() {
        $events = Event::orderBy('date', 'asc')->get();
        return view('content.events', [
            'events' => $events
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'start' => 'required|max:10',
            'end' => 'required|max:10',
            'theme' => 'required|string|max:100',
            'dj' => 'required|array',
            'description' => 'required|max:200|string',
            'picture' => 'required|mimes:jpg,png,jpeg|max:5048|dimensions:max_width=2000,max_height=1100'
        ]);
        $dj = $request->input('dj');
        $dj = json_encode($dj);
        $picture = $request->file('picture');
        $theme = $request->input('theme');
        $date = $request->input('date');
        $picture_naam = $date . '-' . $theme . '.' . $picture->extension();
        
        $picture->move(public_path('media/events'), $picture_naam);
        $events = Event::create([
            'date' => $date,
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'theme' => $theme,
            'dj' => $dj,
            'description' => $request->input('description'),
            'picture' => $picture_naam,
        ]);
        return redirect('/dashboard/event');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        File::delete(public_path('media/events/'.$event->picture));
        $event->delete();
        return redirect('/dashboard/event');
    }

    public function edit($id)
    {   
        $djs = DJ::orderBy('priority', 'desc')->get();
        $event = Event::find($id);
        return view('loggedIn.edit.eventEdit', [
            'event' => $event,
            'djs' => $djs
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'start' => 'required|max:10',
            'end' => 'required|max:10',
            'theme' => 'required|string|max:100',
            'dj' => 'required|array',
            'description' => 'required|max:200|string',
        ]);
        $prev_event = Event::where('id', $id)->first();
        $pic = $prev_event->picture;
        $dj = $request->input('dj');
        $dj = json_encode($dj);
        $event = Event::where('id', $id)->update([
            'date' => $request->input('date'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'theme' => $request->input('theme'),
            'dj' => $dj,
            'description' => $request->input('description'),
            'picture' => $pic,
        ]);
        return redirect('/dashboard/event');
        
    }
    public function editcover($id)
    {   
        $event = Event::find($id);
        return view('loggedIn.edit.eventPhoto', [
            'event' => $event
        ]);
    }
    public function updatecover(Request $request, $id)
    {
        $request->validate([
            'picture' => 'required|mimes:jpg,png,jpeg|max:5048|dimensions:max_width=2000,max_height=1100'
        ]);
        $prev_event = Event::where('id', $id)->first();
        $prev_pic = $prev_event->picture;
        File::delete(public_path('media/events/'.$prev_pic));

        
        $picture = $request->file('picture');
        $theme = $prev_event->theme;
        $date = $prev_event->date;
        $picture_name = $date . '-' . $theme . '.' . $picture->extension();
        $picture->move(public_path('media/events'), $picture_name);

        $event = Event::where('id', $id)->update([
            'date' => $date,
            'start' => $prev_event->start,
            'end' => $prev_event->end,
            'theme' => $theme,
            'dj' => $prev_event->dj,
            'description' => $prev_event->description,
            'picture' => $picture_name,
        ]);
        return redirect('/dashboard/event');
        
    }
    
}
