<x-guest-layout>

    @include('navbar')
    <div class="container">
        <br>
        <div class="row flex justify-content-center">
            <div class="col col-4 mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
        </div>
        @if (session('status'))
        <div class="row flex justify-content-center">
            <div class="col col-4 mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        </div>
        @endif

        <x-jet-validation-errors class="mb-4" />
        <div class="row flex justify-content-center">
            <form method="POST" action="{{ route('password.email') }}" class="col col-4">
                @csrf

                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="flex items-center mt-4">
                    <x-jet-button class="btn bg-light-teal text-white">
                        Email Password Reset Link
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>