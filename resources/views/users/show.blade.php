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
        <div class="col s8 offset-s4">
          <p class="flow-text right">
            Below you can manage and look after your portfolio and see the users you follow.
          </p>
        </div>
      </div>
      <div class="divider"></div>
      @include('portfolios._show', [
        'portfolio' => $user->portfolio
      ])
      <div class="divider"></div>
@include('comments._show')
    </div>


    <!-- <div class="stocks-table">
      <div class="row">
        <div class="col s12 deep-purple-text">
          <h3>Users You Follow</h3>
        </div>
      </div>
      <table id="stocksList" class="bordered responsive-table highlight centered">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th></th>
          <th></th>
        </thead>

        <tbody>
          @foreach ($user->following as $following)

            <tr class="stock-info">
              <td class="symbol">
                {{$following->name}}
              </td>
              <td>
                {{$following->email}}
              </td>
              <td>
                <a href="/users/{{$following->id}}" class="btn-floating waves-effect waves-light" title="View User Info"><i class="material-icons">info_outline</i></a>
              </td>
              <td class="btn-add">
                <form class="" action="/follows/remove_follow" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="toUnfollow_id" value="{{$following->id}}">
                  <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="Unfollow"><i class="material-icons">remove</i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div> -->

  </div>

@endsection
