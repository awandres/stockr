<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function search()
    {
      $thisUser = auth()->user();
      $search = request('search');
      $query = User::orderBy('created_at', 'desc');
      $users = $query->searchByName($search)->simplePaginate(50);

      return view('users.index', compact('users', 'thisUser'));

    }

    public function show()
    {
      $user = auth()->user();

      return view('users.show', compact('user'));
    }

    public function view($id)
    {
      $thisUser = auth()->user();
      $user = User::find($id);
      return view('users.userShow', compact('user', 'thisUser'));
    }

    public function index()
    {
      $thisUser = auth()->user();
      $users = User::orderBy('created_at', 'desc')->simplePaginate(50);
      // $isFollowing = $thisUser->following()->contains($this->id);
      return view('users.index', compact('users', 'thisUser'));
    }

    public function follow()
    {
      $toFollow = User::where('id', request('toFollow_id'))->firstOrFail();
      $user = User::find(auth()->user()->id);

      $user->following()->attach($toFollow->id);

      return redirect()->back();
    }

    public function unfollow()
    {
      $toUnfollow = User::where('id', request('toUnfollow_id'))->firstOrFail();
      $user = User::find(auth()->user()->id);

      $user->following()->detach($toUnfollow->id);

      return redirect()->back();
    }


    public function isFollowing(User $user)
    {
      return $portfolio->stocks->contains($stock_id);
    }


}
