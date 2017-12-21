@extends('layouts.master')

@section('content')



<h1>BROKERS</h1>

<div class="row">
  Search Here
</div>

<div class="stocks-table">
  <table id="stocksList" class="bordered responsive-table highlight centered">
    <thead>
      <th>Name</th>
      <th>Email</th>
      <th></th>
      <th></th>
    </thead>

    <tbody>
      @foreach ($users as $user)
        @unless($thisUser == $user)
        <tr class="stock-info">
          <td class="symbol">
            {{$user->name}}
          </td>
          <td>
            {{$user->email}}
          </td>
          <td>
            <a href="/users/{{$user->id}}" class="btn-floating waves-effect waves-light" title="View User Info"><i class="material-icons">info_outline</i></a>
          </td>
          <td class="btn-add">
            <form class="" action="/portfolio/add_stock" method="post">
              {{  csrf_field() }}
              <input type="hidden" name="stock_id" value="{{$user->id}}">
              <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="Follow"><i class="material-icons">add</i></button>
            </form>
          </td>
        </tr>
        @endunless
      @endforeach
    </tbody>
  </table>
</div>

<div class="pagination">
  Links Here
</div>

@endsection
