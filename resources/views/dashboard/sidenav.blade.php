<div class="sidenav">
    <div id="sidebar" tabindex="5000" style="overflow: hidden; outline: none;">
        <ul class="sidebar-menu" id="nav-accordion" style="display: block;">
            <p class="avatar"><a href="#"><img src="{{ Auth::user()->getAvatar() }}" class="img-circle" width="80"></a></p>
            <h5 class="centered">{{ Auth::user()->name }}</h5>
            <li class="mt">
                <a href="{{ url('profile/tutorials') }}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
                </a>
            </li>
            <li class="mt">
                <a href="{{ url('profile/settings') }}">
                <i class="fa fa-user"></i>
                <span>Edit profile</span>
                </a>
            </li>
            <li class="mt">
                <a href="{{ url('tutorials/create') }}">
                <i class="fa fa-desktop"></i>
                <span>Upload tutorial</span>
                </a>
            </li>
        </ul>
    </div>
</div>