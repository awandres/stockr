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
          <form class="" action="/portfolio/remove_stock" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            Unfollow<input type="hidden" name="stock_id" value="{{$user->id}}">
            <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="remove from portfolio"><i class="material-icons">remove</i></button>
          </form>

      </div>
    </div>
  </header>
  @include('portfolios._show', [
    'portfolio' => $user->portfolio
  ])
</div>



@endsection
