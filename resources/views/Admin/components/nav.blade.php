<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto" method="GET" action="{{ route('admin.searchStore') }}">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search"
                data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ url('admin/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, Admin</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>

                <a href="#" class="dropdown-item has-icon text-danger"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                        class="fas fa-sign-out-alt"></i>
                    Logout</a>
                <form method="POST" hidden action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    {{-- <button type="submit">Logout</button> --}}
                </form>
            </div>
        </li>
    </ul>
</nav>