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
        @if ($thisUser->following->contains('id', $user->id))
        <form class="" action="/follows/remove_follow" method="post">
          {{ csrf_field() }}
          <!-- {{ method_field('DELETE') }} -->
          <input type="hidden" name="toUnfollow_id" value="{{$user->id}}">
          <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="Unfollow"><i class="material-icons">remove</i></button>
        </form>

        @else
        <form class="" action="/follows/add_follow" method="post">
          {{  csrf_field() }}
          <input type="hidden" name="toFollow_id" value="{{$user->id}}">
          <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="Follow"><i class="material-icons">add</i></button>
        </form>
        @endif

      </div>
    </div>
  </header>
  @include('portfolios._show', [
    'portfolio' => $user->portfolio
  ])
</div>



@endsection
