<nav class="navbar navbar-expand-lg bg-light">
    <div class="container d-flex">
        <a class="navbar-brand" href="/students">Muhamad Ardalepa</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/students">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/students/create">Add Students</a>
                </li>
            </ul>
        </div>
        <form action="{{ route('login.logout') }}" method="post">
            @csrf
            <button type="submit" name="logout" class="btn btn-danger" href="logout">Logout</button>
        </form>
    </div>
</nav>