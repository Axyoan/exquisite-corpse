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