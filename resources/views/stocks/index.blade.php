@extends('layouts.master')

@section('content')

<div class="stocks-table">
  <table id="stocksTable" class="bordered responsive-table highlight centered">
    <thead>
      <th>Symbol</th>
      <th>Name</th>
      <th>Sector</th>
      <th>Industry</th>
      <th>Last Closing Price</th>
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
          <td class="add-btn">
            <form class="" action="/portfolio/add_stock" method="post">
              {{  csrf_field() }}
              <input type="hidden" name="stock_id" value="{{$stock->id}}">
              <button type="submit" name="action" class="btn-floating btn-large waves-effect waves-light red" title="add to portfolio"><i class="material-icons">add</i></button>
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
