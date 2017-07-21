@extends('layouts.master')

@section('content')


  <div class="row">
    <div class="welcome col s12 center card-panel deep-purple lighten-5">
      <h1 style="font-family:Lato, Roboto, sans-serif;">Welcome to Stockr</h1>
      <h3>Stalking stocks so you don't have to!</h3>
    </div>
  </div>
  <div class="row">
    <div class="col s8 offset-s2 text-flow section center">
        @if (auth()->check())
          <h5>Welcome Back!</h5>
          <span><a class="btn waves-light waves-effect" href="/dashboard">CLICK HERE</a> to go to your dashboard</span>
        @else
          <h5>Why Don't You Sign Up?</h5>
          <span><a class="btn waves-light waves-effect" href="/register">CLICK HERE</a> sign up for Stockr!</span>
          <div style="margin-top:1em;">
            <span>OR if you already have an account <a href="/login">CLICK HERE</a></span>
          </div>
        @endif
    </div>
  </div>



@endsection
