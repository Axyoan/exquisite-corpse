<nav class="navbar navbar-expand-lg navbar-dark bg-dark-teal" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand text-white fs-3" href="/">Exquisite Corpse</a>
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
                    <a class="nav-link active text-white" aria-current="page" href="/api">API</a>
                </li>
                @auth
                <li class="nav-item p-1">
                    <x-jet-dropdown-link href="{{ route('profile.show') }}" class="nav-link active bg-light-teal text-white rounded">
                        {{Auth::user()->name}}
                    </x-jet-dropdown-link>
                </li>
                <form method="POST" action="{{ route('logout') }}" class="nav-item p-1">
                    @csrf
                    <a class="nav-link active bg-light-teal text-white rounded" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                    </a>
                </form>
                @else
                <li class="nav-item p-1">
                    <a class="nav-link active bg-light-teal text-white rounded" aria-current="page" href="{{route('login')}}">Log in</a>
                </li>
                <li class="nav-item p-1">
                    <a class="nav-link active bg-light-teal text-white rounded" aria-current="page" href="{{ route('register') }}">Sign up</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
