<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;

class UsersController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function search()
    {
      $currentUser = auth()->user();
      $search = request('search');
      $query = User::orderBy('created_at', 'desc');
      $users = $query->searchByName($search)->simplePaginate(50);

      return view('users.index', compact('users', 'currentUser'));

    }

    //filter user search
    public function filter()
    {
      $currentUser = auth()->user();
      $users = $currentUser->following()->simplePaginate(50);
      $filtered = true;

      return view('users.index', compact('users', 'currentUser', 'filtered'));
    }

    //user dashboard
    public function show()
    {
      $currentUser = auth()->user();
      $user = auth()->user(); // to keep things consistent with portfolio blade
      $comments = $currentUser->comments()->orderBy('created_at', 'desc')->get();

      return view('users.show', compact('user', 'comments', 'currentUser'));
    }

    //view individual user profile
    public function view($id)
    {
      $currentUser = auth()->user();
      $user = User::find($id);
      $comments = $user->comments()->orderBy('created_at', 'desc')->get();

      return view('users.userShow', compact('user', 'currentUser', 'comments'));
    }

    //display all users
    public function index()
    {
      $filtered = false;
      $currentUser = auth()->user();
      $users = User::orderBy('created_at', 'desc')->simplePaginate(50);

      return view('users.index', compact('users', 'currentUser', 'filtered'));
    }

    //add follow
    public function follow()
    {
      $toFollow = User::find(request('toFollow_id'));
      $user = User::find(auth()->user()->id);

      $user->following()->attach($toFollow->id);

      return redirect()->back();
    }

    //remove follow
    public function unfollow()
    {
      $toUnfollow = User::where('id', request('toUnfollow_id'))->firstOrFail();
      $user = User::find(auth()->user()->id);

      $user->following()->detach($toUnfollow->id);

      return redirect()->back();
    }


}
