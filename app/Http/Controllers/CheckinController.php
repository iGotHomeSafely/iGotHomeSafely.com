<?php

namespace App\Http\Controllers;

use App\Checkin;
use App\Http\Requests\ProcessCheckinRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckinController extends Controller
{
    public function processCheckin(ProcessCheckinRequest $request)
    {
        $user_id = Auth::id();

        $checkin = new Checkin();
        $checkin->user_id = $user_id;
        $checkin->duration = $request->duration;
        $checkin->save();

        return redirect('/home');
    }

    public function getCheckinsForUser($user_id)
    {
        $checkins = Checkin::where('user_id', $user_id)->all();

        return view('checkins.index')->with('checkins', $checkins);
    }
}
