<x-guest-layout>
    @include('navbar')
    <div class="container">
        <br>
        <div class="row flex justify-content-center">
            <div class="col">
                <h1 class="text-center">Sign up for free</h1>
            </div>
        </div>
        <br>
        <div class="row flex justify-content-center">
            <div class="col col-auto">
                <x-jet-validation-errors class="mb-4" />
            </div>
        </div>
        <div class="row flex justify-content-center">
            <div class="col col-6">
                <form action="{{ route('register') }}" method="POST" class="border-dark-teal px-5 mx-auto p-3 rounded">
                    @csrf
                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <br>
                    <div class="row mx-auto mb-3">
                        <input type="submit" value="Sign up" class="btn bg-light-teal text-white">
                    </div>
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col col-12 mt-4 flex justify-content-center">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>