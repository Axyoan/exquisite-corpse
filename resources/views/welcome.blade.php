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
            <form method="GET">
                @csrf
                <div class="btn-group col col-auto" role="group" aria-label="New or continue">
                    <input type="radio" class="btn-check" name="btnradio" id="btnnew" autocomplete="off" checked value="btnnew">
                    <label class="btn btn-outline-primary fs-4" for="btnnew">New</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btncontinue" autocomplete="off" value="btncontinue">
                    <label class="btn btn-outline-primary fs-4" for="btncontinue">Continue</label>
                </div>
                <button formaction="/drawing/redirect" class="btn col col-auto bg-light-orange rounded me-1 fs-4">
                    Drawing
                    <span class="material-icons">
                        draw
                    </span>
                </button>
                <button formaction="/story/redirect" class=" btn col col-auto bg-yellow rounded fs-4 me-auto">
                    Story
                    <span class="material-icons">
                        notes
                    </span>
                </button>
            </form>
        </div>

    </div>
    <div class="container mt-2 fs-2+">
        <div class="row">
            <div class="col">
                <h2>Gallery</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($stories as $story)
            <div class="col col-auto story-card">
                {{substr($story->text, 0, 100)}}...
                <a href="{{ route('story.show', $story) }}">keep reading</a>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>