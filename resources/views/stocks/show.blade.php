@extends('layouts.master')

@section('content')
<div id="stockPage" data-stock-symbol="{{$stock->symbol}}">
  <header class="section card-panel deep-purple lighten-5">
    <div class="row">
      <div class="col s11">
        <h1 id="stockSymbol">{{$stock->symbol}}</h1>
        <h4>{{$stock->name}}</h4>
      </div>
      <div class="col s1">
        <div class="price">
          <div class="preloader-wrapper small active">
            <div class="spinner-layer">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="position:relative;">
      <div class="col s6 l2">
        <div class="row">
          <div class="col s6 right-align">
            sector:
          </div>
          <div class="col s6">
            {{$stock->sector}}
          </div>
        </div>
        <div class="row">
          <div class="col s6 right-align">
            industry:
          </div>
          <div class="col s6">
            {{$stock->industry}}
          </div>
        </div>
      </div>
      <div class="col s6 l2 right-align" style="position:absolute;right:0;bottom:0;">
        @if (auth()->user()->portfolio->stocks->contains($stock->id))
          <form class="" action="/portfolio/remove_stock" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="hidden" name="stock_id" value="{{$stock->id}}">
            <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="remove from portfolio"><i class="material-icons">remove</i></button>
          </form>
        @else
          <form class="" action="/portfolio/add_stock" method="post">
            {{  csrf_field() }}
            <input type="hidden" name="stock_id" value="{{$stock->id}}">
            <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="add to portfolio"><i class="material-icons">add</i></button>
          </form>
        @endif
      </div>
    </div>
  </header>
  @include('stocks._chart', $stock)
</div>



@endsection
