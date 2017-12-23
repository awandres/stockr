@if ($currentUser->following->contains('id', $user->id))
<form class="" action="/follows/remove_follow" method="post">
  {{ csrf_field() }}
  <!-- {{ method_field('DELETE') }} -->
  <input type="hidden" name="toUnfollow_id" value="{{$user->id}}">
  <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="Unfollow"><i class="material-icons">remove</i></button>
</form>

@elseif (!$currentUser->following->contains('id', $user->id))
<form class="" action="/follows/add_follow" method="post">
  {{  csrf_field() }}
  <input type="hidden" name="toFollow_id" value="{{$user->id}}">
  <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="Follow"><i class="material-icons">favorite</i></button>
</form>

@else

@endif
