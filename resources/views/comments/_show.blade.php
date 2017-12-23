
<div class="divider"></div>
<div class="col s12 center deep-purple-text">
</div>
@foreach ($user->comments as $comment)
<ul class="collection">
   <li class="collection-item avatar">
     <i class="material-icons">person_pin</i>
     <span class="title">{{$comment->author}}</span>
     <p class="flow-text" style="font-size:13px;"><strong>says</strong> <br>
        {{$comment->content}}
     </p>
     <a href="#!" class="secondary-content"><i class="material-icons">clear</i></a>
   </li>
 </ul>
@endforeach
<div class="divider"></div>
