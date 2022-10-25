<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Picture;

class GalleryController extends Controller
{
    public function gallery() {
        $albums = Album::orderBy('date', 'desc')->get();
        return view('content.gallery', [
            'albums' => $albums
        ]);
    }

    public function index() {
        $albums = Album::orderBy('date', 'desc')->get();
        return view('loggedIn.gallerymanaging', [
            'albums' => $albums
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'date' => 'required|date',
            'important' => 'required|boolean',
            'cover' => 'required|mimes:jpg,png,jpeg|max:5048|dimensions:max_width=2000,max_height=1100',
            'fb' => 'required|string'
        ]);
        $cover = $request->file('cover');
        $name = $request->input('name');
        $name= str_replace(' ', '-', $name);
        $date = $request->input('date');
        $picture_naam = $date . '_' . $name . '.' . $cover->extension();

        $cover->move(public_path('media/gallery/'.$name), $picture_naam);
        $albums = Album::create([
            'name' => $request->input('name'),
            'date' => $date,
            'important' => $request->input('important'),
            'cover' => $picture_naam,
            'fb' => $request->input('fb'),
            'count' => 0,
        ]);
        return redirect('/dashboard/gallery');
    }

    public function addpic($id) {
        $album = Album::find($id);
        $pictures = Picture::where('album_id', $id)->get();
        return view('loggedIn.gallery.addpic', [
            'album' => $album,
            'pictures' => $pictures
        ]);
    }

    public function galleryAlbum($id) {
        $album = Album::find($id);
        $pictures = Picture::where('album_id', $id)->get();
        return view('content.album', [
            'album' => $album,
            'pictures' => $pictures
        ]);
    }

    public function destroyAlbum ($id) {
        $album = Album::find($id);
        $pictures = Picture::where('album_id', $id)->get();
        foreach ($pictures as $picture) {
            File::delete(public_path('media/gallery/'.$album->name.'/'.$picture->picture));
            $picture->delete();
        }
        $album = Album::find($id);
        File::delete(public_path('media/gallery/'.$album->name.'/'.$album->cover));
        File::deleteDirectory(public_path('media/gallery/'.$album->name));
        $album->delete();
        return redirect('/dashboard/gallery');
    }

    public function destroypicture(Request $request, $id) {
        $albumid = $request->input('albumid');
        $album = Album::where('id', $albumid)->first();
        $picture = Picture::where('id', $id)->first();
        $album_count = $album->count;
        $album_count_new = $album_count - 1;
        $albumupdate = Album::where('id', $albumid)->update([
            'name' => $album->name,
            'date' => $album->date,
            'important' => $album->important,
            'cover' => $album->cover,
            'fb' => $album->fb,
            'count' => $album_count_new,
        ]);
        File::delete(public_path('media/gallery/'.$album->name.'/'.$picture->picture));
        $picture->delete();
        return redirect('/dashboard/gallery/'.$albumid);
    }

    public function addpictures(Request $request, $id)
    {
        $request->validate([
            'albumid' => 'required',
            'albumname' => 'required|string|max:30',
            'pictures' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png'
        ]);
        $albumname = $request->albumname;
        if($request->hasFile('pictures')){
            $allowedfileExtension=['jpg','png', 'jpeg'];
            $files = $request->file('pictures');
            foreach($files as $file)
            {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check)
                {
                    $picture_naam = $file->getClientOriginalName();
                    $file->move(public_path('media/gallery/'.str_replace(' ', '-', $albumname)), $picture_naam);
                    $pictures = Picture::create([
                        'album_id' => $id,
                        'picture' => $picture_naam,
                    ]);
                    $albumOld = Album::where('name', $albumname)->first();
                    $album_count = $albumOld->count;
                    $count = $album_count + 1;
                    $album = Album::where('name', $albumname)->update([
                        'name' => $albumOld->name,
                        'date' => $albumOld->date,
                        'important' => $albumOld->important,
                        'cover' => $albumOld->cover,
                        'fb' => $albumOld->fb,
                        'count' => $count,
                    ]);
                }
            }
        }
        return redirect('/dashboard/gallery/'.$id);
    }


    public function editalbum($id)
    {   
        $album = Album::find($id);
        return view('loggedIn.edit.albumEdit', [
            'album' => $album
        ]);
    }

    public function updateAlbum(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'date' => 'required|date',
            'important' => 'required|boolean',
            'fb' => 'required|string'
        ]);
        $prev_album = Album::where('id', $id)->first();
        // dd($prev_album);
        $pic = $prev_album->cover;
        $album = Album::where('id', $id)->update([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'important' => $request->input('important'),
            'cover' => $pic,
            'fb' => $request->input('fb'),
        ]);
        return redirect('/dashboard/gallery');
        
    }
    public function editphoto($id)
    {   
        $event = Event::find($id);
        return view('loggedIn.edit.eventPhoto', [
            'event' => $event
        ]);
    }
    public function updatephoto(Request $request, $id)
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
