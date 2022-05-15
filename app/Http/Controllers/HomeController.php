<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $announcements= Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->get()->take(6);
        return view('welcome', compact('announcements'));
    }

   

    public function setLanguages($lang){
        session()->put('locale', $lang);
        return redirect()->route('home');
    }
}
