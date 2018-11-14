<?php

namespace App\Http\Controllers;

use App\Notification as Checkin;
use App\Http\Requests\ProcessCheckinRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckinController extends Controller
{
    public function processCheckin(ProcessCheckinRequest $request)
    {
        $user_id = Auth::id();
        $now = Carbon::now();

        $checkin = new Checkin();
        $checkin->user_id = $user_id;
        $checkin->start = $now;
        $checkin->finish = $now->addHour($request->duration);
        $checkin->home = 1;
        $checkin->save();

        return redirect('/home');
    }

    public function getCheckinsForUser($user_id)
    {
        $checkins = Checkin::where('user_id', $user_id)->all();

        return view('checkins.index')->with('checkins', $checkins);
    }
}
