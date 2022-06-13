<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <img src="{{ URL::asset(FRONTENDURL.ADMIN.'/images/logo.png') }}" alt="GoHealthe Logo" class="brand-image elevation-3"
            style="">
        <span class="brand-text font-weight-light">Cpanel</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ADMINURL.'/viewadmin'}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ADMINURL.'/viewcategories'}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ADMINURL.'/viewsubcategories'}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Sub-Category
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ADMINURL.'/viewclients'}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Clients
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ADMINURL.'/viewclientgallery'}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption('profile')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact us</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ADMINURL.'/change_password'}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ADMINURL.'/logout'}}" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>


            </ul>
        </nav>

    </div>

</aside>
