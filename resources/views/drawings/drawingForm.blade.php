<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>New Drawing</title>
</head>

<body>
    @include('navbar')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>
                    <?php echo isset($drawing) ? "Continue Drawing" : "New Drawing" ?>
                </h2>
                @if(isset($msg))
                <span class="text-dark-orange fs-5">{{$msg}}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col fs-5">
                <p>
                    <?php
                    echo (isset($drawing)) ?
                        "Below is the end of a random drawing, draw the rest of it."
                        :
                        "Start drawing a picture and another user will finish it. Remember they will only be able to see a small part of the bottom of your drawing."
                    ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="thickness">Thickness:</label>
                <input type="number" id="thickness" min="1" max="50" value="5" onchange="changeThickness()">
                <label for="color">Color:</label>
                <input type="color" name="color" id="color" onchange="changeColor()">
                <br><br> 
                @if(isset($drawing))
                    <form action="{{ route('drawing.update', $drawing) }}" method="POST" id="formEditCanvas">
                    @method('PATCH')
                @else
                    <form action="{{route('drawing.store')}}" method="POST" id="formCanvas">
                @endif
                        @csrf
                    @if(isset($drawing))
                    <input type="hidden" name="prevDrawing" id="prevDrawing" value="{{$drawing->image}}">
                        <canvas id="prevCanvas" class="canvas"></canvas>
                    @endif
                    <canvas class="drawing-canvas canvas"></canvas>
                    <input type="hidden" name="png" id="png">
                    <br>
                    <button type="submit" class="btn btn-primary bg-light-teal" id="submitCanvas">Submit</button>
                </form>
                <canvas id="result" class="canvas"></canvas>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/canvas.js') }}"></script>
</body>

</html>