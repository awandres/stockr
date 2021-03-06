<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

  public function __constructor()
  {
    $this->middleware('guest', ['except' => 'destroy']);
  }

  public function create()
  {
    return view('sessions.create');
  }

  public function store()
  {
    if (! auth()->attempt(request(['email', 'password']))) {
      return back()->withErrors([
        'message' => 'Please check your credentials.'
      ]);
    }

    return redirect()->route('dashboard');
  }

  public function destroy()
  {
    auth()->logout();

    return redirect('/');
  }

}
