<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Certificate;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $myevent = DB::table('events')->where('id', $request->myevent)->get();
        $applicants = Application::where('event_id', $request->myevent)->where('status', 'accept')->get();
        return view('myevents.certificate',[
            'myevent_details' => $myevent[0],
            'myevent' => $myevent[0]->id,
            'organizer' => $request->organizer,
            'applicants' => $applicants
        ]);
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('certificate')) {
            $event = Event::find($request->myevent);
            $acceptedApplicants = $event->applications()->where('status', 'ACCEPT')->get();

            foreach ($acceptedApplicants as $applicant) {
                $user = $applicant->user;

                $fileName = $user->id . '_' . time();
                $path = $request->file('certificate')->storeAs('certificate_images', $fileName, 'public');

                $certificate = new Certificate();
                $certificate->user_id = $user->id;
                $certificate->certificate = $path;
                $certificate->save();
            }
        }

        return redirect()->route('myevents.certificate', ['myevent' => $request->myevent]);
    }
}
