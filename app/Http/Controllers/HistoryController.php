<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Certificate;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function register(Request $request){
        $user = $request->user();
        $applications = $user->applications()->with('event');

        if ($request->has('filter') && $request->filter !== 'ALL') {
            $applications->where('status', $request->filter);
        }

        $applications = $applications->get();

        return view('historys.register', [
            'applications' => $applications
        ]);
    }

    public function registerDetail(Event $event){
        return view('events.show', [
            'event' => $event
        ]);
    }

    public function certificate() {
        $certificates = DB::table('certificates')
                        ->where('user_id', Auth::user()->id)
                        ->get();
        return view('historys.certificate', ['certificates' => $certificates]);
    }
}
