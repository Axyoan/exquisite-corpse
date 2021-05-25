<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Exquisite Corpse</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-teal" role="navigation">
        <div class="container-fluid">
            <div class="navbar-brand text-white fs-3">Exquisite Corpse</div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2">
                    <li class="nav-item p-1">
                        <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link active text-white" aria-current="page" href="/about">About</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link active bg-light-teal text-white rounded" aria-current="page" href="/account">Log in</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link active bg-light-teal text-white rounded" aria-current="page" href="{{ route('account.create') }}">Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-2 border-dark-teal rounded fs-2">
        <div class="row justify-content-start p-1">
            <div class="col col-auto">
                New:
            </div>
            <div class="btn col col-auto bg-light-orange rounded me-1 fs-4">
                Drawing
                <span class="material-icons">
                    draw
                </span>
            </div>
            <div class="btn col col-auto bg-yellow rounded fs-4">
                Story
                <span class="material-icons">
                    notes
                </span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>