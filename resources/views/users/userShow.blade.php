@extends('layouts.master')

@section('content')
<div id="stockPage" data-stock-symbol="">
  <header class="section card-panel deep-purple lighten-5">
    <div class="row">
      <div class="col s11">
        <h4>{{$user->name}}</h4>
      </div>
    </div>
    <div class="row" style="position:relative;">
      <div class="col s6 l2">
        <div class="row">
          <div class="col s6 right-align">
            Name:
          </div>
          <div class="col s6">
            {{$user->name}}
          </div>
        </div>
        <div class="row">
          <div class="col s6 right-align">
            Email:
          </div>
          <div class="col s6">
            {{$user->email}}
          </div>
        </div>
      </div>
      <div class="col s6 l2 right-align" style="position:absolute;right:0;bottom:0;">
        @if ($currentUser->following->contains('id', $user->id))
        <h6>Unfollow</h6>
        @else
        <h6>Follow</h6>
        @endif

        @include('users._follow')
      </div>
    </div>
  </header>

  @include('comments._create')

  
  @include('comments._show')


  @include('portfolios._show', [
    'portfolio' => $user->portfolio
  ])
  <p style="margin:0px 300px;"> (You can add or remove these stocks to/from your portfolio!) </p>

</div>



@endsection
