<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();

        return view('revisor.index', compact('announcement_to_check'));

    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);

        return redirect()->back()->with(`message`, `Hai accettato l'annuncio`);

    }

    public function refusesAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);

        return redirect()->back()->with(`message`, `Hai rifiutato l'annuncio`);

    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect('/')->with('message', 'Hai richiesto di diventare revisore correttamente');
    }

    public function makeRevisor(User $user){

        Artisan::call('app:make-user-revisor', ['email' =>$user->email]);
        return redirect('/')->with('message', "L'utente è diventato revisore");

    }
}
