<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{ route('home') }}" class="logo"><span>PA<span>NEL</span></span><i class="mdi mdi-layers"></i></a>
        <!-- Image logo -->
        <!--<a href="index.html" class="logo">-->
        <!--<span>-->
        <!--<img src="assets/images/logo.png" alt="" height="30">-->
        <!--</span>-->
        <!--<i>-->
        <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
        <!--</i>-->
        <!--</a>-->
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">

            <div class="clearfix">
                <!-- Navbar-left -->
                <ul class="nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                    <li class="d-none d-sm-inline-block">
                        <form role="search" class="app-search">
                            <input type="text" placeholder="Search..."
                                   class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>


                </ul>

                <!-- Right(Notification) -->
                <ul class="nav navbar-right">





                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{ asset('assets/backend/images/avatar.png') }}" alt="user-img" class="rounded-circle user-img">
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                            <li>
                                <h5>{{Auth::user()->name}}</h5>
                            </li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="ti-user m-r-5"></i>Profile</a></li>
                            <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                                <a href="{{ route('admin.settings') }}">
                                    <i class="ti-settings m-r-5"></i>
                                    <span>Settings</span>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="ti-power-off m-r-5"></i>
                                    <span>Logout</span>
                                </a></li>
                        </ul>
                    </li>

                </ul> <!-- end navbar-right -->
            </div>

        </div><!-- end container -->
    </div><!-- end navbar -->
</div>