<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>New Story</title>
</head>

<body>
    @include('navbar')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>
                    <?php echo isset($story) ? "Continue Story" : "New Story" ?>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col fs-5">
                <p>
                    <?php
                    echo (isset($story)) ?
                        "Below are the last 100 characters of a random story. Continue writing it. You can then pass it on to another user, or finish it. If you decide to pass it on, remember the next user will only be able to see the last 100 characters."
                        :
                        "Start writing a story and another user will continue writing it. Remember they will only be able to see the last 100 characters of what you write."
                    ?>
                </p>
            </div>
        </div>
        @if(isset($story))
        <div class="row">
            <div class="col">
                <p>
                    <?php
                    echo substr($story[0]->text, -100);
                    ?>
                </p>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                @if(isset($story))
                    <form action="{{ route('story.update', $story[0]) }}" method="POST">
                    @method('PATCH')
                @else
                    <form action="{{route('story.store')}}" method="POST">
                @endif
                        @csrf
                        <textarea name="text" id="story" cols="100" rows="10" minlength="200" maxlength="1000" required></textarea>
                        @if(isset($story))
                        <br>
                        <input type="checkbox" id="isFinished" name="isFinished" value="isFinished" checked>
                        <label for="isFinished" class="fs-3">Finish the story</label>
                        <br>
                        @endif
                        <br>
                        <button type="submit" class="btn btn-primary bg-light-teal">Submit</button>

                    </form>
            </div>
        </div>
    </div>
</body>

</html>