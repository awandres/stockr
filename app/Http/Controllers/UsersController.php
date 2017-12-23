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

    public function filter()
    {
      $currentUser = auth()->user();
      $users = $currentUser->following()->simplePaginate(50);
      $filtered = true;

      return view('users.index', compact('users', 'currentUser', 'filtered'));
    }

    public function show()
    {
      $currentUser = auth()->user();
      $user = auth()->user();
      // $comments = Comment::where('posted_to_id', $user->id);
      $comments = $user->comments()->orderBy('created_at', 'desc')->get();

      return view('users.show', compact('user', 'comments', 'currentUser'));
    }

    public function view($id)
    {
      $currentUser = auth()->user();
      $user = User::find($id);
      // $comments = Comment::where('posted_to_id', $user);
      $comments = $user->comments()->orderBy('created_at', 'desc')->get();

      return view('users.userShow', compact('user', 'currentUser', 'comments'));
    }

    public function index()
    {
      $filtered = false;
      $currentUser = auth()->user();
      $users = User::orderBy('created_at', 'desc')->simplePaginate(50);
      // $isFollowing = $currentUser->following()->contains($this->id);

      return view('users.index', compact('users', 'currentUser', 'filtered'));
    }

    public function follow()
    {
      $toFollow = User::find(request('toFollow_id'));
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


}
