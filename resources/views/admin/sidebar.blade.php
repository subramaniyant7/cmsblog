<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ADMINURL.'/dashboard'}}" class="brand-link">
        <img src="{{ URL::asset(FRONTENDURL.ADMIN.'/images/logo.png') }}" alt="GoHealthe Logo" class="brand-image elevation-3" style="">
        <span class="brand-text font-weight-light">Cpanel</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ADMINURL.'/dashboard'}}" class="nav-link">
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
                            About Us
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['profile']) }}" class="nav-link" name="{{ pageName()['profile']}}">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['who'])}}" class="nav-link">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Who We Are</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['vision'])}}" class="nav-link">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Vision Mission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Director Message</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['why'])}}" class="nav-link">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Why Us</p>
                            </a>
                        </li>
                    </ul>
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
                            <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['software'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Software</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['medical'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Medical Equipments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['faq'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bioclad <i class="fas fa-angle-left right"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['bclad'])}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bioclad (Landing Page)</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['anti']).'&&page='.encryption(pageName()['bclad']) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Antimicrobial Wall Cladding</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['hygenic']).'&&page='.encryption(pageName()['bclad'])}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Hygenic Wall Cladding</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['wall']).'&&page='.encryption(pageName()['bclad'])}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Wall Protection</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['ips']).'&&page='.encryption(pageName()['bclad'])}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>IPS</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['safety']).'&&page='.encryption(pageName()['bclad'])}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Safety Flooring</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['doorsets']).'&&page='.encryption(pageName()['bclad'])}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Doorsets</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item">
                            <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['pclad'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Printclad</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['kclad'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kleenclad</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ADMINURL.'/uploadimages'}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Wesbite Images
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ADMINURL.'/social_media'}}" class="nav-link">
                        <i class="nav-icon far fa-globe"></i>
                        <p>
                            Social Media
                        </p>
                    </a>
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