    <!-- Start Header -->
    <header class="header">
        <!-- Start Header Top -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-8">
                        <p><i class="fa fa-map-marker"></i> #3, First Floor, 4th street Ganesh Nagar,
                            GK Industrial Estate, Alappakam Main Road
                            Porur, Chennai - 600 016


                        </p>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-4">
                        <ul class="header-top-social">
                            @php
                                $facebook = $twitter = $linkedin = $instagram = '';
                                $mediaLink = getSocialMedia();
                                if(count($mediaLink)){
                                    $facebook = $mediaLink[0]->facebook;
                                    $twitter = $mediaLink[0]->twitter;
                                    $linkedin = $mediaLink[0]->linkedin;
                                    $instagram = $mediaLink[0]->instagram;
                                }
                            @endphp
                            <li><a href="{{ $facebook }}" class="social" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $twitter }}" class="social"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ $linkedin }}" class="social" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ $instagram }}" class="social" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="logo">
                            <a href="{{ url(FRONTENDURL) }}"><img src="{{ URL::asset('frontend/assets/img/logo.png') }}" alt="logo"></a>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <ul class="middle-right">
                            <li>
                                <div class="icon email">
                                    <img src="{{ URL::asset('frontend/assets/img/email.png') }}" alt="email">
                                </div>

                                <div class="text">
                                    <span>Send us a Email</span>
                                    <p><a href="mailto: admin@gohealthe.com">admin@gohealthe.com
                                        </a></p>
                                </div>
                            </li>



                            <li>
                                <div class="icon phone">
                                    <img src="{{ URL::asset('frontend/assets/img/phone.png') }}" alt="phone">
                                </div>

                                <div class="text">
                                    <span>Have any question?</span>
                                    <p><a href="tel: +91 44 42810141">+91 44 42810141</a> /
                                        <a href="tel: +91 94426 38379">+91 94426 38379</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->

        <!-- Start Main Menu -->
        <div class="main-header-area header-sticky">
            <div class="container">
                <div class="classy-nav-container breakpoint-off">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="travelNav">
                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="{{ url(FRONTENDURL) }}">Home</a></li>

                                    <li><a href="#">About Us</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ url(FRONTENDURL.'profile/pageview') }}">Profile</a></li>
                                            <li><a href="{{ url(FRONTENDURL.'whoweare/pageview') }}">Who We Are</a></li>
                                            <li><a href="{{ url(FRONTENDURL.'visionmission/pageview') }}">Vision & Mission</a></li>
                                            <li><a href="{{ url(FRONTENDURL.'profile/pageview') }}">Director Message</a></li>
                                            <li><a href="{{ url(FRONTENDURL.'whyus/pageview') }}">Why Us</a></li>
                                            <li><a href="{{ url(FRONTENDURL.'ourclients') }}">Our Clients</a></li>
                                            <li><a href="{{ url(FRONTENDURL.'profile/pageview') }}">Downloads</a></li>
                                        </ul>
                                    </li>


                                    <li><a href="#">Installation</a>
                                        <ul class="dropdown" style="width:270px;">
                                            <li><a href="#">Wall Cladding</a></li>
                                            <li><a href="#">Floor Cladding</a></li>
                                            <li><a href="#">Construction By Specification</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#">Projects</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Design</a></li>
                                            <li><a href="#">Develop</a></li>
                                            <li><a href="#">Deliver</a></li>
                                            <li><a href="#">Maintain</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#">Products</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ url(FRONTENDURL.'bioclad/pageview') }}">bioclad</a></li>
                                            <li><a href="{{ url(FRONTENDURL.'printclad/pageview') }}">Printclad</a></li>
                                            <li><a href="{{ url(FRONTENDURL.'kleenclad/pageview') }}">Kleenclad</a></li>
                                        </ul>
                                    </li>


                                    <li><a href="{{ url(FRONTENDURL.'medicalequipment/pageview') }}">Medical Equipments</a></li>

                                    <li><a href="{{ url(FRONTENDURL.'software/pageview') }}">Software</a></li>

                                    <li><a href="{{ url(FRONTENDURL.'gallery') }}">Gallery</a></li>

                                    <li><a href="{{ url(FRONTENDURL.'contactus') }}">Contact Us</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Main Menu -->


    </header>
    <!-- End Header -->