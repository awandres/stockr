@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="col s12 center deep-purple-text">
          <h3>Welcome to your dashboard, {{$user->name}}!</h3>
        </div>
      </div>
      @foreach ($user->following as $following)
        {{$following->name}}
      @endforeach
      <div class="row">
        <div class="col s8 offset-s4">
          <p class="flow-text right">
            Below you can manage and look after your portfolio.
          </p>
        </div>
      </div>
      <div class="divider"></div>
      @include('portfolios._show', [
        'portfolio' => $user->portfolio
      ])
    </div>
  </div>

@endsection
