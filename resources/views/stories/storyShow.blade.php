<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <title>Story</title>
</head>

<body onload="init();">
    @include('navbar')
    <div class="container">
        <br>
        <br>
        <div class="row">
            <p class="col col-12 story">{{$story->text}}</p>
        </div>
        <div class="row fs-5">
            <div class="col">
            Authors ({{count($authors)}}):
            </div>
        </div>
        <div class="row fs-4">
            <div class="col col-auto">
            @foreach ($authors as $author)
                <span class="fs-6">{{$author->name}},</span>
            @endforeach
        </div>
        </div>
        <hr>
        <div class="row">
            <div class="col col-1">
                <form action="{{ route('story.update', $story) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="change" value="inc">
                    <button type="submit">
                        <span class="material-icons">
                            thumb_up
                        </span>
                    </button>
                </form>
            </div>
            <span class="col col-1">
                {{$story->score}}
            </span>
            <div class="col">
                <form action="{{ route('story.update', $story) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="change" value="dec">
                    <button type="submit">
                        <span class="material-icons">
                            thumb_down
                        </span>
                    </button>
                </form>
            </div>

        </div>
        <br><br>
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
            <form class="col col-auto" action="{{route('comment.post-comment', $story)}}" method="POST">
                @csrf
                <textarea name="text" id="" cols="100" rows="5" minlength="1" maxlength="500"></textarea>
                <br>
                <input type="submit" value="Post comment" class="bg-light-teal btn rounded text-white">
            </form>
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
</body>

</html>