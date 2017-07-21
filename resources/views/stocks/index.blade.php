@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col s12">
    <form class="" action="/stocks" method="post">
      {{  csrf_field() }}
      <div class="row">
        <div class="col s12 input-field">

          <i class="material-icons prefix">search</i>
          <input id="search" name="search" type="text" class="validate">
          <label for="search">Search</label>
        </div>
      </div>
      <div class="row">
        <div class="col s6">
          <span class="switch" style="margin-right:1em;">
            search by stock symbol:
            <label>
              Off
              <input type="checkbox" id="by_symbol" name="by_symbol" checked>
              <span class="lever"></span>
              On
            </label>
          </span>
          <span class="switch">
            search by company name:
            <label>
              Off
              <input type="checkbox" id="by_name" name="by_name">
              <span class="lever"></span>
              On
            </label>
          </span>
        </div>

      </div>


    </form>
  </div>
</div>

<div class="stocks-table">
  <table id="stocksList" class="bordered responsive-table highlight centered">
    <thead>
      <th>Symbol</th>
      <th>Name</th>
      <th>Sector</th>
      <th>Industry</th>
      <th>Last Closing Price</th>
      <th></th>
      <th></th>
    </thead>

    <tbody>
      @foreach ($stocks as $stock)
        <tr class="stock-info">
          <td class="symbol">
            {{$stock->symbol}}
          </td>
          <td>
            {{$stock->name}}
          </td>
          <td>
            {{$stock->sector}}
          </td>
          <td>
            {{$stock->industry}}
          </td>
          <td class="price">
            <div class="preloader-wrapper small active">
              <div class="spinner-layer">
                <div class="circle-clipper left">
                  <div class="circle"></div>
                </div>
              </div>
            </div>
          </td>
          <td>
            <a href="/stocks/{{$stock->slug}}" class="btn-floating waves-effect waves-light" title="view stock info"><i class="material-icons">info_outline</i></a>
          </td>
          <td class="btn-add">
            <form class="" action="/portfolio/add_stock" method="post">
              {{  csrf_field() }}
              <input type="hidden" name="stock_id" value="{{$stock->id}}">
              <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="add to portfolio"><i class="material-icons">add</i></button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="pagination">
  {{ $stocks->links() }}
</div>

@endsection
