<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header"> <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b>
                    <img src="{{asset('_admin/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" /> </b>
                <span>
        <!-- dark Logo text -->
        <h4 class="text-white" style="margin-top: -50px!important;">SKYLOAN ADMIN</h4>
                    <!-- Light Logo text -->
        <img src="{{asset('_admin/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span> </a> </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                <li class="nav-item dropdown"> <a  href="#"  class="nav-link dropdown-toggle waves-effect waves-dark font-weight-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-Information"></i> </a> </li>
                <li>
                    <div class="time-date"><i class="fa fa-calendar-o"></i>@php date_default_timezone_set('Africa/Lagos'); @endphp &nbsp; {{date('d:m:Y')}} <img src="{{asset('_admin/assets/images/sep.png')}}" alt=""> <i class="fa fa-clock-o"></i> &nbsp;  {{date('H:i:s')}}</div>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown u-pro"> <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="hidden-md-down">Hi, {{Auth::user()->fullname}} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated fadeIn">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-text">
                                        <h4>{{Auth::user()->email}}</h4>

                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('admin.logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>