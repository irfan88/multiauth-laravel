<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home');
    }

    public function settings()
    {
        if (Gate::allows('be-organizer')) {
            return view('settings.organizer');
        }
        if (Gate::allows('be-participant')) {
          return view('settings.participant');
        }
    }

    public function premium()
    {
        $this->authorize('premium-access');
        return 'Halaman premium...';
    }

    public function editEvent($id)
    {
        $event = \App\NewEvent::findOrFail($id);
        // $this->authorize('edit-event', $event);
        $this->authorize('update', $event);
        return "Anda sedang mengakses halaman edit event " . $event->name;
    }

    public function joinEvent($id)
    {
        $event = \App\NewEvent::findOrFail($id);
        // $this->authorize('join-event', $event);
        $this->authorize('join', $event);
        return "Anda sedang mengakses halaman join event " . $event->name;
    }

    public function editOrganization($id)
    {
        $organization = \App\Organization::findOrFail($id);
        // echo 'id = '.$id;
        // dd($organization->name);exit;
        $this->authorize('update', $organization);
        return "Anda sedang mengakses halaman edit organisasi " . $organization->name;
    }
}
