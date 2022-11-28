<nav class="navbar navbar-expand-lg bg-light fixed-top">
    <div class="container d-flex">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="/students">Students</a>
                </li>
                @if (auth()->user()->role === 1)
                <li class="nav-item">
                    <a class="nav-link" href="/students">User</a>
                </li>
                @endif
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
            </ul>
            @auth
            <div class="ms-auto nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false">{{auth()->user()->name}}</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/profile">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('auth.logout') }}" method="post" class="p-0 m-0">
                            @csrf
                            <button type="submit" name="logout" class="dropdown-item" href="logout">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <a href="/login" class="nav-link">Login</a>
            @endauth
        </div>

    </div>
</nav>