<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>About</title>
</head>

<body>
    @include('navbar')

    <div class="container text-start mt-3">
        <h1 class="fs-1">About</h1>
        <p>
            Exquisite corpse, also known as exquisite cadaver (from the original French term cadavre exquis), is a method by which a collection of words or images is collectively assembled. Each collaborator adds to a composition in sequence, by being allowed to see only the end of what the previous person contributed.
        </p>
        <div class="container mx-auto">
            <img class="img-fluid mx-auto d-block" src="https://upload.wikimedia.org/wikipedia/commons/b/bc/Exquisite_Corpse_%286042257203%29.jpg" alt="Drawing made with the exquisite corpse method">
            <br>
            <a href="https://www.flickr.com/people/65256905@N04">DIYLILCNC</a>, <a href="https://commons.wikimedia.org/wiki/File:Exquisite_Corpse_(6042257203).jpg">Exquisite Corpse (6042257203)</a>, <a href="https://creativecommons.org/licenses/by-sa/2.0/legalcode" rel="license">CC BY-SA 2.0</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>