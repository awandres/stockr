@extends('layouts.master')

@section('content')



<h1>Stockrs</h1>

<div class="row">
  <form class="" action="/users" method="post">
    {{  csrf_field() }}
    <div class="row">
      <div class="col s12 input-field">

        <i class="material-icons prefix">search</i>
        <input id="search" name="search" type="text" class="validate">
        <label for="search">Search by Name</label>
      </div>
    </div>
  </form>
</div>


<div class="row">
  @if ($filtered)

    See All Users
    <a href="/users/"><button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="remove from portfolio"><i class="material-icons">add</i></button></a>

  @else

    Filter by Following<input type="hidden" name="" value="">
    <a href="/filtered/users"><button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="remove from portfolio"><i class="material-icons">remove</i></button></a>

  @endif
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
        @unless($thisUser->id == $user->id)
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
            @if ($thisUser->following->contains('id', $user->id))
            <form class="" action="/follows/remove_follow" method="post">
              {{ csrf_field() }}
              <!-- {{ method_field('DELETE') }} -->
              <input type="hidden" name="toUnfollow_id" value="{{$user->id}}">
              <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="Unfollow"><i class="material-icons">remove</i></button>
            </form>

            @elseif (!$thisUser->following->contains('id', $user->id))
            <form class="" action="/follows/add_follow" method="post">
              {{  csrf_field() }}
              <input type="hidden" name="toFollow_id" value="{{$user->id}}">
              <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="Follow"><i class="material-icons">add</i></button>
            </form>

            @else

            @endif
          </td>
        </tr>
        @endunless
      @endforeach
    </tbody>
  </table>
</div>

<div class="pagination">
  {{ $users->links() }}
</div>

@endsection
