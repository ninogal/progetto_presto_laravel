<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){

        return view('announcements.create');
    }

    public function show(Announcement $announcement){
        $relateds = Announcement::where('is_accepted', true)->where('category_id', $announcement->category_id)->orderBy('created_at', 'desc')->get()->take(3);
        return view('announcements.show', compact('announcement', 'relateds'));
    }

    public function searchAnnouncements(Request $request){
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(9);
        return view('announcements.all', compact('announcements'));
    }

    public function showAnnunci(){
        $announcements= Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(9);
        return view('announcements.all', compact('announcements'));
    }
}
