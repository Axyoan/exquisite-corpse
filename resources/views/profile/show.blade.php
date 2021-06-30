<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Profile</title>
</head>
<body>
    @include('navbar')
    <div class="container m-5 p-5">
        <div class="container">
            <div class="row">
                <h2 class="col">
                    Account information
                </h2>
            </div>
            <div class="row justify-content-start">
                <p class="col col-6">
                    Update your account's information.
                </p>
            </div>
            @if (Session::get('infoErrors') && !empty(Session::get('infoErrors')))
                <div class="row text-dark-orange">
                    <span>ERROR:</span>
                    <ul>
                        @foreach (Session::get('infoErrors') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('updateUser', Auth::user())}}" class="row">
                @csrf
                @method('UPDATE')
                <div class="col col-auto">
                    <div class="col col-12">
                        <label for="name">Name:</label>
                        <br>
                        <input type="text" name="name" id="name" value="{{Auth::user()->name}}" required>
                    </div>
                    <div class="col col-12">
                        <label for="email">Email:</label>
                        <br>
                        <input type="email" name="email" id="email" value="{{Auth::user()->email}}" required>
                    </div>
                    <br>
                    <input type="submit" value="Save" class="btn rounded bg-dark-teal text-white fs-5">
                </div>
            </form>
        </div>
        <br><hr><br>
        <div class="container">
            <div class="row">
                <h2 class="col">
                    Update password
                </h2>
            </div>
            <div class="row justify-content-start">
                <p class="col col-12">
                    Use a long password with a variety of characters.
                </p>
            </div>
            @if (Session::get('passwordErrors') && !empty(Session::get('passwordErrors')))
                <div class="row text-dark-orange">
                    <span>ERROR:</span>
                    <ul>
                        @foreach (Session::get('passwordErrors') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('updateUser', Auth::user())}}" class="row">
                @method('UPDATE')
                <div class="col col-auto">
                    <div class="col col-12">
                        <label for="oldPassword">Old Password:</label>
                        <br>
                        <input type="password" name="oldPassword" id="oldPassword" required>
                    </div>
                    <div class="col col-12">
                        <label for="newPassword">New Password:</label>
                        <br>
                        <input type="password" name="newPassword" id="newPassword" required>
                    </div>
                    <div class="col col-12">
                        <label for="newPasswordConfirm">Confirm new Password:</label>
                        <br>
                        <input type="password" name="newPasswordConfirm" id="newPasswordConfirm" required>
                    </div>
                    <br>
                    <input type="submit" value="Save" class="btn rounded bg-dark-teal text-white fs-5">
                </div>
            </form>
        </div>
        <br><hr><br>
        <div class="container">
            <div class="row">
                <h2 class="col">Delete account</h2>
            </div>
            <div class="row justify-content-start">
                <p class="col col-auto">
                    This will not delete any of the posts you contributed to, only your comments. Click the button below if you are sure you want to delete your account.
                </p>
            </div>
            <a href="{{route('deleteUser', Auth::User())}}" class="btn rounded bg-dark-orange text-white col fs-5">Delete your account</a>
        </div>
    </div>
    
</body>
</html>

{{-- 

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
 --}}