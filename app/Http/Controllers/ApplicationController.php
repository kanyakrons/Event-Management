<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ApplicationController extends Controller
{


    public function form(Request $request, Event $event)
    {

        return view('application.form', [
            'user' => $request->user(),
            'event' => $event
        ]);
    }
    public function verify(Request $request, $event, $applicant,)
    {

        
        $applicant = Application::findOrFail($applicant);
        $myevent = Event::findOrFail($event);
        $organizer =  Organizer::where('id', $request->organizer)->get();
        return view('application.verify', [

            'myevent' => $myevent,
            'applicant' => $applicant,
            'organizer' => $organizer[0]
            
        ]);
    }
    public function update(Request $request,$applicant)
    {
        $action = $request->input('action');
        $applicant = Application::findOrFail($applicant);
        $myevent = Event::findOrFail($request->event);
        $organizer =  Organizer::where('id', $request->organizer)->get();
        if ($action === 'accept') {
            $applicant->status = 'ACCEPT';
        } elseif ($action === 'reject') {
            $applicant->status = 'REJECT';
        }
        $applicant->save();
       
        return  redirect()->route('myevents.applicants', ['event' => $myevent,'myevent' => $myevent, 'organizer' => $organizer[0]]);

        
    }









    public function store(Event $event)
    {
        
         $application = new Application();
         $application->status = 'WAITING';
         $application->user_id = Auth::user()->id;
         $application->event_id = $event->id;
         $application->save();
            return redirect()->route('event');
        
    }
   
}
