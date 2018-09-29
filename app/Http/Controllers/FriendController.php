<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUnverifiedFriendRequest;
use App\Http\Requests\FriendSearchRequest;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $user_id = Auth::id();
        $friend = User::where('email', $request->email)->first();

        try
        {
            DB::table('friend_user')->insert([
                'user_id' => $user_id,
                'friend_id' => $friend->id,
            ]);
        }
        catch (QueryException $exception)
        {
            dd($exception->getMessage());
        }

    }
}
