
<div class="divider"></div>
<div class="col s12 center deep-purple-text">
</div>
@foreach ($comments as $comment)
<ul class="collection">
   <li class="collection-item avatar">
     <i class="material-icons">person_pin</i>
     <span class="title">{{$comment->author}}</span>
     <p class="flow-text" style="font-size:13px;"><strong>says</strong> <br>
        {{$comment->content}}
     </p>
     @if ($comment->posted_to_id == $currentUser->id)
     <form class="secondary-content" action="/delete/{{$comment->id}}" method="delete">
       {{  csrf_field() }}
       <input type="hidden" name="comment_id" value="delete">
       <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="Delete"><i class="material-icons">clear</i></button>
     </form>
     @endif
   </li>
 </ul>
@endforeach
<div class="divider"></div>
