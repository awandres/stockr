@extends('layouts.master')

@section('content')

<div class="stocks-table">
  <table class="bordered responsive-table">
    <thead>
      <th>Symbol</th>
      <th>Name</th>
      <th>Sector</th>
      <th>Industry</th>
    </thead>

    <tbody>
      @foreach ($stocks as $stock)
        <tr>
          <td>
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
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{ $stocks->links() }}


@endsection
