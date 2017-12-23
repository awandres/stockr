
@if ($currentUser->following->contains('id', $user->id))
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="row">
  <div id="comment-form">
    <form class="" action="/comments/{{$user->id}}" method="post">
      {{csrf_field()}}
      <div class="input-field col s12">
        <i class="material-icons prefix">mode_edit</i>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <textarea id="msg" name="content" class="materialize-textarea" placeholder="Leave a Comment"></textarea>
      </div>
      <div class="row">
        <div class="form-actions s12 right-align">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endif
