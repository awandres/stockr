<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
