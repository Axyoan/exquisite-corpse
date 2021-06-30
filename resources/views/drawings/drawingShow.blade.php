<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <title>Drawing</title>
</head>

<body>
    @include('navbar')
    <div class="container">
        <br>
        <br>
        <div class="row">
            <img src="{{$drawing->image}}" alt="drawing" max-width="1000" max-height="1400" id="image" class="drawing">
        </div>
        <br>

        <div class="row fs-5"><div class="col">Resize Image:</div></div>
        <div class="row d-flex p-1 justify-content-between">
            <button class="col col-auto bg-light-orange text-white fs-6 btn rounded" id="sizeFit">Fit screen</button>
            <button class="col col-auto bg-light-orange text-white fs-6 btn rounded" id="size25">25%</button>
            <button class="col col-auto bg-light-orange text-white fs-6 btn rounded" id="size50">50%</button>
            <button class="col col-auto bg-light-orange text-white fs-6 btn rounded" id="size75">75%</button>
            <button class="col col-auto bg-light-orange text-white fs-6 btn rounded" id="size100">100%</button>
            <div class="col col-8"></div>
        </div>
        <br>
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
                <form action="{{ route('drawing.update', $drawing) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="change" value="inc">
                    <button type="submit" class="thumb-up">
                        <span class="material-icons">
                            thumb_up
                        </span>
                    </button>
                </form>
            </div>
            <span class="col col-1">
                {{$drawing->score}}
            </span>
            <div class="col">
                <form action="{{ route('drawing.update', $drawing) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="change" value="dec">
                    <button type="submit" class="thumb-down">
                        <span class="material-icons">
                            thumb_down
                        </span>
                    </button>
                </form>
            </div>

        </div>
        <br><br>
        @include('comments', ['drawing'=>$drawing]);
        
    <script src="{{ asset('js/resizeImage.js') }}"></script>
</body>

</html>