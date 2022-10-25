<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DJ;
use Illuminate\Support\Facades\File;

class DjController extends Controller
{

    public function index()
    {

        $djs = DJ::orderBy('priority', 'desc')->get();
        return view('loggedIn.djmanaging', [
            'djs' => $djs
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:200',
            'priority' => 'required',
            'picture' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        $picture = $request->file('picture');
        $name = $request->input('name');
        $picture_naam = $name . '.' . $picture->extension();

        $picture->move(public_path('media/dj'), $picture_naam);
        $events = DJ::create([
            'name' => $name,
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'picture' => $picture_naam,
            'snapchat' => $request->input('snapchat'),
            'instagram' => $request->input('instagram'),
            'facebook' => $request->input('facebook'),
            'linkedin' => $request->input('linkedin'),
            'mix' => $request->input('mix'),
        ]);
        return redirect('/dashboard/dj');
    }

    public function destroy($id)
    {
        $dj = DJ::find($id);
        File::delete(public_path('media/dj/'.$dj->picture));
        $dj->delete();
        return redirect('/dashboard/dj');
    }

    public function edit($id)
    {   
        $dj = DJ::find($id);
        return view('loggedIn.edit.djEdit', [
            'dj' => $dj
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:200',
            'priority' => 'required'
        ]);
        $prev_dj = DJ::where('id', $id)->first();
        $pic = $prev_dj->picture;
        $dj = DJ::where('id', $id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'picture' => $pic,
            'snapchat' => $request->input('snapchat'),
            'instagram' => $request->input('instagram'),
            'facebook' => $request->input('facebook'),
            'linkedin' => $request->input('linkedin'),
            'mix' => $request->input('mix'),
        ]);
        return redirect('/dashboard/dj');
        
    }
    public function editphoto($id)
    {   
        $dj = DJ::find($id);
        return view('loggedIn.edit.djPhoto', [
            'dj' => $dj
        ]);
    }
    public function updatephoto(Request $request, $id)
    {
        $request->validate([
            'picture' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        $prev_dj = DJ::where('id', $id)->first();
        $prev_pic = $prev_dj->picture;
        File::delete(public_path('media/dj/'.$prev_pic));

        
        $picture = $request->file('picture');
        $name = $prev_dj->name;
        $picture_naam = $name . '.' . $picture->extension();
        $picture->move(public_path('media/dj'), $picture_naam);


        $dj = DJ::where('id', $id)->update([
            'name' => $prev_dj->name,
            'description' => $prev_dj->description,
            'priority' => $prev_dj->priority,
            'snapchat' => $prev_dj->snapchat,
            'instagram' => $prev_dj->instagram,
            'facebook' => $prev_dj->facebook,
            'linkedin' => $prev_dj->linkedin,
            'mix' => $prev_dj->mix,
            'picture' => $picture_naam
        ]);
        return redirect('/dashboard/dj');
        
    }
}
