@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="col s12 center deep-purple-text">
          <h3>Welcome to your dashboard, {{$user->name}}!</h3>
        </div>
      </div>
      <div class="row">
        <div class="col s8">
          <p class="flow-text">
            You can look at a list of all stocks <a href="/stocks">HERE</a>.
          </p>
        </div>
      </div>
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