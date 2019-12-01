        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> 
                            <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="@yield('status')"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="mdi mdi-feather"></i>
                                <span class="hide-menu">Manage</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="{{ route('category') }}">
                                        Category
                                    </a>    
                                    <a href="{{ route('questionnaire') }}" class="@yield('status')">
                                        Questionnaire
                                    </a>    
                                    <a href="{{ route('examinee') }}">
                                        Examinee
                                    </a>    
                                    <a href="{{ action('DepartmentsController@index') }}">
                                        Departments
                                    </a>
                                    <a href="{{ action('CoursesController@index') }}">
                                        Courses
                                    </a>      
                                </li>
                            </ul>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="index.html" aria-expanded="false"><i class="mdi mdi-view-list"></i><span class="hide-menu">Result</span></a>
                        </li>
                        <li class=""> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="ti-settings"></i>
                                <span class="hide-menu">Settings</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="#">
                                        Account Setting
                                    </a>    
                                    <a href="{{ url('/admin/settings/school-year') }}" class="@yield('status')">
                                        School-Year Setting
                                    </a>      
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer" style="background: #1d2531">
                <!-- item-->
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> 
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>       
            </div>
            <!-- End Bottom points-->
        </aside>
