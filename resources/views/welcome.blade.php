<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Exquisite Corpse</title>
</head>

<body>
    @include('navbar')
    <div class="container mt-2 fs-2">
        <div class="row justify-content-start p-1">
            <h2 class="col col-auto fs-2">
                Create posts
            </h2>
        </div>
        @if(Auth::check() && Auth::user()->email_verified_at)
        <form method="GET" class="row p-1">
            @csrf
            <div class="btn-group col col-8 col-lg-3 align-items-center" role="group" aria-label="New or continue">
                <input type="radio" class="btn-check" name="btnradio" id="btnnew" autocomplete="off" checked value="btnnew">
                <label class="btn btn-outline-primary fs-4" for="btnnew">
                    New
                </label>

                <input type="radio" class="btn-check" name="btnradio" id="btncontinue" autocomplete="off" value="btncontinue">
                <label class="btn btn-outline-primary fs-4" for="btncontinue">
                    Continue
                </label>
            </div>
            <div class="col col-8 col-lg-3">
                <button formaction="/drawing/redirect" class="btn bg-light-orange rounded me-1 fs-4">
                    Drawing
                    <span class="material-icons">
                        draw
                    </span>
                </button>
                <button formaction="/story/redirect" class="btn bg-yellow rounded fs-4 me-auto">
                    Story
                    <span class="material-icons">
                        notes
                    </span>
                </button>
            </div>
        </form>
        @else
        <div class="btn-group col col-auto fs-4">
            You must be logged in and have a verified email to post.
        </div>
        @endif
        <br>
        <div class="row">
            <div class="col">
                <h2>Gallery</h2>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($all_posts as $post)
                @if ($post->type=="drawing")
                    <a href="{{ route('drawing.show', $post) }}" class="link col col-auto story-card fs-6">
                        <img src="{{$post->image}}" alt="drawing" width="250" height="375">
                        <br>
                        <div class="row fs-6 justify-content-start">
                            <div class="col col-auto">
                                Score: {{$post->score}}
                            </div>
                            <div class="col col-auto">
                                Comments: {{count($post->comments)}}
                            </div>
                        </div>
                    </a>
                @else
                    <a href="{{ route('story.show', $post) }}" class="link col story-card fs-6">
                        <p>
                            {{substr($post->text, 0, 100)}}...
                        </p>
                        <div class="row fs-6 justify-content-start">
                            <div class="col col-auto">
                                Score: {{$post->score}}
                            </div>
                            <div class="col col-auto">
                                Comments: {{count($post->comments)}}
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>