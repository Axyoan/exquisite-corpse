<div class="row">
    <div class="col col-auto">
        <h2 class="fs-3 text-dark-teal">Comments</h2>
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <h2 class="fs-4 text-light-teal">New comment:</h2>
    </div>
</div>
<div class="row">
    @if(Auth::check() && Auth::user()->email_verified_at)
        
    @if(isset($story))
        <form class="col col-auto" action="{{route('story.post-comment', $story)}}" method="POST">
    @endif
    @if(isset($drawing))
        <form class="col col-auto" action="{{route('drawing.post-comment', $drawing)}}" method="POST">
    @endif
            @csrf
            <textarea name="text" id="" cols="100" rows="5" minlength="1" maxlength="500"></textarea>
            <br>
            <input type="submit" value="Post comment" class="bg-light-teal btn rounded text-white">
        </form>
    @else
        <span>You must be logged in and have a verified email to comment</span>
    @endif
</div>
<br><br>
<div class="row">
    <div class="col col-10">
        @if(count($comments)==0)
        <h3 class="fs-5">No comments yet :(</h3>
        @endif
        <ul>
            @foreach($comments as $comment)
            <li class="comment-card">
                <h3>{{$comment->author}}</h3>
                <p>{{$comment->text}}</p>
                @if($comment->user_id && $comment->user_id==Auth::id())
                    <form action="{{route('comment.destroy', $comment)}}" method="post">
                    @csrf
                    @method('DELETE')
                        <input type="submit" value="Delete Comment" class="btn rounded bg-light-teal text-white">
                    </form>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
</div>