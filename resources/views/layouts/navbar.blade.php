<div class="header">
    <div class="collapse" id="exCollapsingNavbar">
        <div class="bg-inverse p-a">
            <h4>Main Menu</h4>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#">Tutorials</a></li>
            </ul>
        </div>
    </div>
    <nav class="navbar navbar-light navbar-inverse bg-faded navbar-fixed-top">
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
        ☰
        </button>
        <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar">
            <a class="navbar-brand" href="{{ url('/') }}">Ocademy</a>
            <ul class="nav navbar-nav pull-right">
                <li class="nav-item" style="padding-right: 20px">
                    <a class="nav-link" href="{{ url('/tutorials') }}">Tutorials</a>
                </li>
                @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="{{ Auth::user()->getAvatar() }}" class="nav-avatar img-circle">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu" style="background: #3F4B5B; width: 170px; margin-top: 11px; border-radius: 0px">
                            <li><a href="{{ url('/profile/tutorials') }}"><i class="fa fa-dashboard fa-fw" style="margin: 0 8px"></i>Dashboard</a></li>
                            <li style="padding-top: 20px;"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out" style="margin: 0 10px"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>