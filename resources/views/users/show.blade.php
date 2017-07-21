@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="col s12 center">
          <h3>Welcome to your dashboard, {{$user->name}}!</h3>
        </div>
      </div>
    </div>
  </div>

@endsection
