<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationsController extends Controller
{

    public function create()
    {
      return view('registrations.create');
    }

    public function store()
    {
      // validate the form
      $this->validate(request(), [

        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed'

      ]);

      // create and save the user

      $user = User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password'))
      ]);

      // sign them in
      auth()->login($user);

      // redirect to dasboard
      return redirect()->route('dashboard');
    }

    public function show()
    {
      return view('registrations.show');
    }

}
