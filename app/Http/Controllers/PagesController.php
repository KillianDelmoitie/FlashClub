<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Album;
use App\Models\DJ;

class PagesController extends Controller
{
    public function index() {
        $event = Event::orderBy('date', 'asc')->where('date', '>=', Date('Y-m-d'))->first();
        if($event == null) { 
            $event = Event::where('id', '=', 1)->first();
            $album = Album::orderBy('date', 'desc')->first();
            $djs = DJ::orderBy('priority', 'desc')->get();
            return view('content.index', [
                'event' => $event,
                'album' => $album,
                'djs' => $djs
            ]);
        } else {
            $album = Album::orderBy('date', 'desc')->first();
            $djs = DJ::orderBy('priority', 'desc')->get();
            return view('content.index', [
                'event' => $event,
                'album' => $album,
                'djs' => $djs
            ]);
        }
    }
    public function gallery() {
        return view('content.gallery');
    }
    public function maintenance() {
        return view('content.maintenance');
    }
    public function contact() {
        return view('content.contact');
    }
    
    // public function inschrijvingenAdmin() {
    //     if(auth()->user()->admin == 1) {
    //         return view('content.admin.inschrijvingen');
    //     } else {
    //         return view('content.index');
    //     }
    // }
}
