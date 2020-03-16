        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    
                            <!-- Light Logo icon -->
                            <i class="mdi mdi-feather" style="color:#fff;"></i>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span style="color:#fff;">
                         <!-- Light Logo text -->    
                         SDSSUAEEv.1.1  
                        </span> 
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-sm-down app-header"> 
                            <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)">
                                SDSSU Automated Entrance Examination w/ SMS Notification
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/assets/images/users/{{ Auth::user()->profile_picture }}" alt="user" class="profile-pic m-r-10" />
                                <small>{{ Auth::user()->name }}</small>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>