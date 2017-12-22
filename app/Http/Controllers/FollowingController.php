<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowingController extends Controller
{

  public function add_follow()
  {



            $user = User::find(auth()->user()->id);
            $userToFollow = User::find(request('user_id'));

            if ($user && $userToFollow) {
                $user->following()->attach($userToFollow);

            }


      // $following = Following::create([
      //   'user_id' => auth()->user()->id,
      //   'following_id' => request('user_id'),
      // ]);





    return redirect()->route('users');
  }
}
