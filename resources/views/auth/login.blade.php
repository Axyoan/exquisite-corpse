<x-guest-layout>
    @include('navbar')
    <div class="container">
        <br>
        <div class="row flex justify-content-center">
            <div class="col">
                <h1 class="text-center">Log in</h1>
            </div>
        </div>
        <div class="row flex justify-content-center">
            <div class="col col-auto">
                <x-jet-validation-errors class="mb-4" />
            </div>
        </div>
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        <div class="row flex justify-content-center">
            <div class="col col-6">
                <form action="{{ route('login') }}" method="POST" class="border-dark-teal px-5 mx-auto p-3 rounded">
                    @csrf
                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
                    <br>
                    <div class="mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
                    <div class="row mx-auto mb-3">
                        <input type="submit" value="Log in" class="btn bg-light-teal text-white">
                    </div>
                </form>
            </div>
        </div>
</x-guest-layout>