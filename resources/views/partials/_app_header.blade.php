<!-- Navigation Bar-->
<header id="topnav">
   

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{route('applications')}}">Requests</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"></i>Users Control</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="{{route('roles')}}">Roles</a></li>
                                    <li><a href="{{route('users')}}">Users</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="{{route('field-control.create')}}">Field Control</a>
                    </li>

                    <li class="has-submenu">
                        <a href="{{route('home')}}">User information</a>
                    </li>

                    <li class="has-submenu">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                    </li>

                </ul>
                <!-- End navigation menu --> 

            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
