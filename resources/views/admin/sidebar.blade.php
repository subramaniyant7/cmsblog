<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ADMINURL.'/dashboard'}}" class="brand-link">
        <img src="{{ URL::asset(FRONTENDURL.ADMIN.'/images/logo.png') }}" alt="GoHealthe Logo" class="brand-image elevation-3" style="">
        <span class="brand-text font-weight-light">Cpanel</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ADMINURL.'/dashboard'}}" class="nav-link {{ request()->segment(2) == 'dashboard' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard 
                        </p>
                    </a>
                </li>

                @if(Session::get('admin_role') == 1)
                <li class="nav-item">
                    <a href="{{ADMINURL.'/viewadmin'}}" class="nav-link {{ request()->segment(2) == 'viewadmin' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ADMINURL.'/viewcategories'}}" class="nav-link {{ request()->segment(2) == 'viewcategories' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ADMINURL.'/viewsubcategories'}}" class="nav-link {{ request()->segment(2) == 'viewsubcategories' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Sub-Category
                        </p>
                    </a>
                </li>

                @if(Session::get('admin_role') == 1)
                <li class="nav-item">
                    <a href="{{ADMINURL.'/viewclients'}}" class="nav-link {{ request()->segment(2) == 'viewclients' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Clients
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ADMINURL.'/viewclientgallery'}}" class="nav-link {{ request()->segment(2) == 'viewclientgallery' ? 'active' : ''}}">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>

                @php
                $about = $installation = $innovation = $project = $pages = $product = $medical = $software = $bio = $print = $kclad = '';
                $aboutUs = [pageName()['profile'],pageName()['who'],pageName()['vision'],pageName()['director'],pageName()['why']];
                $innvo = [pageName()['survivo'],pageName()['goggle']];
                $install = [pageName()['wallclad'],pageName()['floorclad'],pageName()['construction']];
                $pro = [pageName()['design'],pageName()['deliver'],pageName()['maintain'],pageName()['develop']];
                $pagesContent = [pageName()['software'],pageName()['medical'],pageName()['faq'],pageName()['privacy'],pageName()['terms']];
                $productContent = [];
                $medicalequipment = [pageName()['otproduct'],pageName()['ivf']];
                $soft = [pageName()['life'],pageName()['ferti']];
                $bioClad = [pageName()['bclad'],pageName()['anti'],pageName()['hygenic'],pageName()['wall'],
                pageName()['ips'],pageName()['safety'],pageName()['doorsets']];
                $productContent = array_merge($productContent,$bioClad);
                $printClad = [pageName()['pclad'],pageName()['photo']];
                $productContent = array_merge($productContent,$printClad);
                $kleenClad = [pageName()['kclad'],pageName()['kclAnti'],pageName()['kclhygenic']];
                $productContent = array_merge($productContent,$kleenClad);


                if(request()->type && in_array(decryption(request()->type),$aboutUs)){
                $about = 'menu-open';
                }

                if(request()->type && in_array(decryption(request()->type),$innvo)){
                $innovation = 'menu-open';
                }

                if(request()->type && in_array(decryption(request()->type),$install)){
                $installation = 'menu-open';
                }

                if(request()->type && in_array(decryption(request()->type),$medicalequipment)){
                $medical = 'menu-open';
                }

                if(request()->type && in_array(decryption(request()->type),$soft)){
                $software = 'menu-open';
                }

                if(request()->type && in_array(decryption(request()->type),$pro)){
                $project = 'menu-open';
                }

                if(request()->type && in_array(decryption(request()->type),$pagesContent)){
                $pages = 'menu-open';
                }
                if(request()->type && in_array(decryption(request()->type),$productContent)){
                $product = 'menu-open';
                }
                if(request()->type && in_array(decryption(request()->type),$bioClad)){
                $bio = 'menu-open';
                }
                if(request()->type && in_array(decryption(request()->type),$printClad)){
                $print = 'menu-open';
                }

                if(request()->type && in_array(decryption(request()->type),$kleenClad)){
                $kclad = 'menu-open';
                }

                @endphp

                @if(Session::get('admin_role') == 1)
                    <li class="nav-item {{$about}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                About Us
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['profile']) }}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['profile'] ? 'active' : ''}}" name="{{ pageName()['profile']}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['who'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['who'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Who We Are</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['vision'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['vision'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Vision Mission</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['director'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['director'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Director Message</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['why'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['why'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Why Us</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{$innovation}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Innovation
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['survivo']).'&&page='.encryption(pageName()['innov']) }}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['survivo'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Survivo Wellness</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['goggle']).'&&page='.encryption(pageName()['innov'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['goggle'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Goggle Tech</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{$installation}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Installation
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['wallclad']).'&&page='.encryption(pageName()['install']) }}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['wallclad'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Wall Cladding</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['floorclad']).'&&page='.encryption(pageName()['install'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['floorclad'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Floor Cladding</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['construction']).'&&page='.encryption(pageName()['install'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['construction'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Construction by Specification</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{$project}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                Projects
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['design']) }}" class="nav-link {{ request()->type && decryption(request()->type) == pageName()['design'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Design</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['develop'])}}" class="nav-link {{ request()->type && decryption(request()->type) == pageName()['develop'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Develop</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['deliver'])}}" class="nav-link {{ request()->type && decryption(request()->type) == pageName()['deliver'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Deliver</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['maintain'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['maintain'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Maintain</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{$product}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                Products
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{$bio}}">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bioclad <i class="fas fa-angle-left right"></i></p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['bclad'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['bclad'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Bioclad (Landing Page)</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['anti']).'&&page='.encryption(pageName()['bclad']) }}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['anti'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Antimicrobial Wall Cladding</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['hygenic']).'&&page='.encryption(pageName()['bclad'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['hygenic'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Hygenic Wall Cladding</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['wall']).'&&page='.encryption(pageName()['bclad'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['wall'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Wall Protection</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['ips']).'&&page='.encryption(pageName()['bclad'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['ips'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>IPS</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['safety']).'&&page='.encryption(pageName()['bclad'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['safety'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Safety Flooring</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['doorsets']).'&&page='.encryption(pageName()['bclad'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['doorsets'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Doorsets</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <li class="nav-item {{$print}}">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>PrintClad <i class="fas fa-angle-left right"></i></p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['pclad'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['pclad'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Printclad (Landing Page)</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['photo']).'&&page='.encryption(pageName()['pclad']) }}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['photo'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Photoclad</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <li class="nav-item {{$kclad}}">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kleenclad <i class="fas fa-angle-left right"></i></p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['kclad'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['kclad'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kleenclad (Landing Page)</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['kclAnti']).'&&page='.encryption(pageName()['kclad']) }}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['kclAnti'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Antimicrobial Wall Cladding</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['kclhygenic']).'&&page='.encryption(pageName()['kclad']) }}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['kclhygenic'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Hygenic Wall Cladding</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>

                        </ul>
                    </li>

                    <li class="nav-item {{$medical}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                Medical Equipments
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['otproduct']) }}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['otproduct'] ? 'active' : ''}}" name="{{ pageName()['profile']}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>OT Products</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['ivf'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['ivf'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>IVF Products</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{$software}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                Software
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['life']).'&&page='.encryption(pageName()['soft']) }}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['life'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Life Whisperer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionproductpageinfo?type='.encryption(pageName()['ferti']).'&&page='.encryption(pageName()['soft']) }}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['ferti'] ? 'active' : ''}}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Ferti Assist</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{$pages}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Pages
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['home'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['home'] ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Home</p>
                                </a>
                            </li>
                        
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['medical'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['medical'] ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Medical Equipments</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['faq'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['faq'] ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>FAQ</p>

                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['privacy'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['privacy'] ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Privacy Policy</p>

                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ ADMINURL.'/actionpageinfo?type='.encryption(pageName()['terms'])}}" class="nav-link {{ request()->type && decryption(request()->type)   == pageName()['terms'] ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Terms & Conditions</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ADMINURL.'/uploadimages'}}" class="nav-link {{ request()->segment(2) == 'uploadimages' ? 'active' : ''}}">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Wesbite Images
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ADMINURL.'/social_media'}}" class="nav-link {{ request()->segment(2) == 'social_media' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>
                                Social Media
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ADMINURL.'/feature'}}" class="nav-link {{ request()->segment(2) == 'feature' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-key"></i>
                            <p>
                                Feature
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ADMINURL.'/change_password'}}" class="nav-link {{ request()->segment(2) == 'change_password' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-key"></i>
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