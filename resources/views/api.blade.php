<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>API</title>
</head>

<body>
    @include('navbar')

    <div class="container text-start mt-3 fs-4">
        <h1 class="fs-1">API</h1>
        <p>
            You can request either a random finished story or drawing by using the endpoints <span class="font-weight-bold text-light-teal">/story/getStory</span> or <span class="font-weight-bold text-light-teal">/drawing/getDrawing</span>  respectively. These will return a json with the following fields:
        </p>
        <span class="fs-3 text-dark-teal">
            {
                <div class="tab">id: integer,</div>
                <div class="tab">score: integer,</div>
                <div class="tab">isFinished: boolean,</div>
                <div class="tab">created_at: date,</div>
                <div class="tab">updated_at: date</div>
            }
        </span>
        <br><br>
        <p>
            Depending on whether you request a story or a drawing, they each have an unique field called "text" and "image" respectively. "text" is self explanatory. "image" is a string produced from the method <a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement/toDataURL">toDataUrl</a> which contains the raw data of the png which describes the drawing.
        </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>