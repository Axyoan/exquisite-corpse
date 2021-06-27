<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Sign up</title>
</head>

<body>
    @include('navbar')
    <div class="container">

        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h1 class="text-center">Sign up for free</h1>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="{{ route('register') }}" method="POST" class="border-dark-teal px-5 mx-auto p-3 rounded">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label ">Username</label>
                        <input type="text" name="name" id="name" class="form-control" value='<?php echo ((isset($name)) ? $name : ""); ?>'>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value='<?php echo (isset($email)) ? $email : ""; ?>'>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Repeat Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                    <div class="row mx-auto mb-3">
                        <input type="submit" value="Sign up" class="btn bg-light-teal text-white">
                    </div>
                    @if(isset($error))
                    <div class="container bg-danger rounded text-white">
                        ERROR:
                        {{$error}}
                    </div>
                    @endif
            </div>
            </form>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>