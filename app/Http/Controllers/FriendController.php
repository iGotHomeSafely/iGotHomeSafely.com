<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUnverifiedFriendRequest;
use App\Http\Requests\FriendSearchRequest;
use App\Mail\NewFriendRequestMail;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class FriendController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('friends.index')->with('friends', $user->friends);
}

    public function doSearch(FriendSearchRequest $request)
    {
        $match = User::where('email', $request->email)->first();

        return view('search.results')->with('match', $match);
    }

    public function addUnverifiedFriend(AddUnverifiedFriendRequest $request)
    {
        $user = Auth::user();
        $friend = User::where('email', $request->email)->first();

        try
        {
            DB::table('friend_user')->insert([
                'user_id' => $user->id,
                'friend_id' => $friend->id,
            ]);

            Mail::to($friend->email)->send(new NewFriendRequestMail($friend, $user));
        }
        catch (QueryException $exception)
        {

        }

        $request->session()->flash('status', 'Friend Request Sent');

        return redirect('home');
    }

    public function viewFriendRequests(Request $request)
    {
        $user = Auth::user();

        return view('friend-requests.index')->with('pending_friends', $user->receivedInvites);
    }

    public function approveFriendRequest(Request $request)
    {
        $user = Auth::user();

        $filtered_friends = $user->receivedInvites->filter(function($userFoo) use ($request)
        {
            return $userFoo->id == $request->user_id;
        });

        if (\count($filtered_friends) === 1)
        {
            $friend = $filtered_friends->first();
            // approve the friendship
            DB::table('friend_user')
              ->where('user_id', $friend->id)
              ->where('friend_id', $user->id)
              ->update(['validated' => 1]);
            // Create the reverse
            DB::table('friend_user')->insert([
                'user_id' => $user->id,
                'friend_id' => $friend->id,
                'validated' => 1,
            ]);

            $request->session()->flash('status', 'Friend Request Approved');
        }
        else
        {
            $request->session()->flash('status', 'Unable to find friend request for approval.');
        }

        return redirect('home');
    }
}
