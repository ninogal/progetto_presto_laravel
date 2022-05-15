<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use phpDocumentor\Reflection\Types\Boolean;

class RevisorController extends Controller
{

    public function __construct(){
        $this->middleware('isRevisor')->except('becomeRevisor');
    }

    public function index(){
        $announcements = Announcement::where('is_accepted', null)->paginate(10);
        return view('revisor.index', compact('announcements'));
    }

    public function show(Announcement $announcement){
        return view('revisor.show', compact('announcement'));
    }

    public function continueShow(){
        $announcement = Announcement::where('is_accepted', null)->first();
        return view('revisor.continue-show', compact('announcement'));
    }

    public function checkAnnouncements(){
        $announcements = Announcement::where('is_accepted', '>=', 0)->orderBy('created_at', 'desc')->paginate(10);
         return view('revisor.check', compact('announcements'));
    }

    public function acceptAnnouncement(Announcement $announcement, $value){
        $announcement->setAccepted(true);
        if($value=='true'){
            return redirect()->route('revisor.index')->with('message', "Complimenti hai accettato l'annuncio");
        }else{
            return redirect()->route('continue.show')->with('message', "Complimenti hai accettato l'annuncio");
        }
    }

    public function rejectAnnouncement(Announcement $announcement, $value){
        $announcement->setAccepted(false);
        if($value=='true'){
            return redirect()->route('revisor.index')->with('message', "Complimenti hai rifiutato l'annuncio");
        }else{
            return redirect()->route('continue.show')->with('message', "Complimenti hai rifiutato l'annuncio");
        }
    }

    public function undoAnnouncement(Announcement $announcement){
        $announcement->setAccepted(NULL);
        return redirect()->route('revisor.check')->with('message', "La revisione dell'articolo è stata annullata. Lo troverai in articoli da revisionare!");
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.com')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->with('message', 'Complimenti hai richiesto di diventare revisore!');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:MakeUserRevisor', ['email'=>$user->email]);
        return redirect()->route('home')->with('message', 'Complimenti è diventato revisore!');
    }
}
