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

    public function show()
    {
      $user = auth()->user();

      return view('users.show', compact('user'));
    }

    public function view($id)
    {
      $user = User::find($id);
      return view('users.userShow', compact('user'));
    }

    public function index()
    {
      $thisUser = auth()->user();
      $users = User::orderBy('created_at', 'desc')->simplePaginate(50);

      return view('users.index', compact('users', 'thisUser'));
    }

    public function follow()
    {
      $toFollow = User::where('id', request('toFollow_id'))->firstOrFail();
      $user = User::find(auth()->user()->id);

      $user->following()->attach($toFollow->id);

      return redirect('users');
    }

    public function unfollow($name)
    {
      $toFollow = User::where('name', $name)->firstOrFail();
      $user = User::find(auth()->user()->id);

      $user->following()->attach($toFollow->id);

      return redirect('users');
    }


}
