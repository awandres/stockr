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

    public function index()
    {
      $users = User::orderBy('created_at', 'desc')->simplePaginate(50);

      return view('users.index', compact('users'));
    }
}
