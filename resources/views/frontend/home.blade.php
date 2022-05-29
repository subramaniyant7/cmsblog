@extends('frontend.layout')


@section('content')


<!-- Start Main Banner -->
<div class="skdslider">
    <ul id="demo1" class="slides">
        <li><a href="#"><img src="{{ URL::asset('frontend/assets/img/slides/1.jpg') }}" alt="Gohealthe"></a></li>
        <li><a href="#"><img src="{{ URL::asset('frontend/assets/img/slides/2.jpg') }}" alt="Gohealthe" height="auto"></a></li>
        <li><a href="#"><img src="{{ URL::asset('frontend/assets/img/slides/3.jpg') }}" alt="Gohealthe" height="auto"></a></li>
        <li><a href="#"><img src="{{ URL::asset('frontend/assets/img/slides/4.jpg') }}" alt="Gohealthe"></a></li>
    </ul>
</div>

<!-- Start Welcome Area -->
<section class="welcome-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="welcome-text">
                    <span>Welcome to Go Healthe</span>
                    <h4>Providing MEDICAL DEVICES AND EQUIPMENTS HEALTHCARE
                        ENGINEERING Services</h4>
                    <p>
                    <div class="widget services-list">
                        <ul>
                            <li> <span class="left"><i class="fa fa-angle-right"></i></span> GoHealthe Services helps hospitals and clinics to buy Medical Equipments for the speciality services and general use also.</li>
                            <li><span class="left"><i class="fa fa-angle-right"></i></span> Provide support of Installation, Maintenance and Training.</li>
                            <li><span class="left"><i class="fa fa-angle-right"></i></span> NABH certification & calibration.</li>
                            <li><span class="left"><i class="fa fa-angle-right"></i></span> Bulk supply of disposable items for various departments.</li>
                            <li><span class="left"><i class="fa fa-angle-right"></i></span> OT Products</li>
                            <li><span class="left"><i class="fa fa-angle-right"></i></span> IVF Products</li>
                            <li><span class="left"><i class="fa fa-angle-right"></i></span> Solution for needs of customers</li>
                            <li><span class="left"><i class="fa fa-angle-right"></i></span> Contract manufacturing of Engineering products</li>
                            <li><span class="left"><i class="fa fa-angle-right"></i></span> Designing and developing of prototype products and manufacturing of products as per customerrequirements.</li>

                        </ul>
                    </div>
                    </p>



                    <div class="gq-au-btn">
                        <a href="#" class="btn btn-primary mr-20">Contact us</a>
                        <a href="#" class="btn btn-primary btn-color">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <img src="{{ URL::asset('frontend/assets/img/welcome.png') }}">
            </div>
        </div>
    </div>
</section>
<!-- End Welcome Area -->


<!-- Start About Area -->
<section class="about-area ptb-80 bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-about">
                    <img src="{{ URL::asset('frontend/assets/img/1.png') }}" alt="icon">

                    <h3>Our Profile</h3>
                    <p>Started
                        distribution of
                        in as
                        National Level
                        Distributor for
                        Hygienic
                        Wall Cladding<br><br></p>

                    <a href="#" class="read-more-btn">
                        <span class="left"><i class="fa fa-chevron-circle-right"></i></span>
                        Read More
                        <span class="right"><i class="fa fa-chevron-circle-right"></i></span>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-about">
                    <img src="{{ URL::asset('frontend/assets/img/3.png') }}" alt="icon">

                    <h3>Our Vision & Mission</h3>
                    <p>Providing quality
                        medical devices,
                        healthcare engineering
                        and hospital
                        infrastructure to make
                        a better world
                        tomorrow.</p>

                    <a href="about.html" class="read-more-btn">
                        <span class="left"><i class="fa fa-chevron-circle-right"></i></span>
                        Read More
                        <span class="right"><i class="fa fa-chevron-circle-right"></i></span>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="single-about">
                    <img src="{{ URL::asset('frontend/assets/img/2.png') }}" alt="icon">

                    <h3>Director Message</h3>
                    <p>we continuously strive
                        to add and fine-tune our
                        knowledge in order
                        to bind newer cutting
                        edge technologies to
                        our products and
                        services.
                    </p>

                    <a href="about.html" class="read-more-btn">
                        <span class="left"><i class="fa fa-chevron-circle-right"></i></span>
                        Read More
                        <span class="right"><i class="fa fa-chevron-circle-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area -->



<!-- Start Services Area -->
<section class="services-area ptb-80">
    <div class="container">
        <div class="section-title">
            <h3>SECTORS WE WORK IN</h3>
        </div>

        <div class="row">
            <div class="partner-slider">
                <div class="col-lg-12 col-md-12">
                    <div class="item" align="center">
                        <a href="#"><img src="{{ URL::asset('frontend/assets/img/ico5.png') }}"><br>
                            <strong>Healthcare</strong></a>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="item" align="center">
                        <a href="#"><img src="{{ URL::asset('frontend/assets/img/ico6.png') }}"><br>
                            <strong>Education</strong></a>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="item" align="center">
                        <a href="#"><img src="{{ URL::asset('frontend/assets/img/ico7.png') }}"><br>
                            <strong>Sports & Leisure</strong></a>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="item" align="center">
                        <a href="#"><img src="{{ URL::asset('frontend/assets/img/ico8.png') }}"><br>
                            <strong>Hospitality</strong></a>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="item" align="center">
                        <a href="#"><img src="{{ URL::asset('frontend/assets/img/ico9.png') }}"><br>
                            <strong>Commercial</strong></a>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="item" align="center">
                        <a href="#"><img src="{{ URL::asset('frontend/assets/img/ico10.png') }}"><br>
                            <strong>Animal Care</strong></a>
                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <div class="item" align="center">
                        <a href="#"><img src="{{ URL::asset('frontend/assets/img/ico11.png') }}"><br>
                            <strong>Pharmaceutical</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Services Area -->


<!-- Start Case Studies Area -->
<section class="case-studies-area ptb-80 pb-110">
    <div class="animation-shape">

    </div>

    <div class="container">
        <div class="section-title">
            <h3>Our Products</h3>
        </div>

        <div class="row m-0">
            <div class="col-lg-6 col-md-6 p-0">
                <div class="case-studies-box">
                    <div class="row m-0">
                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="case-studies-img">
                                <a href="#"><img src="{{ URL::asset('frontend/assets/img/case-studies-img1.jpg') }}" alt="case-studies"></a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="case-studies-content">
                                <h3><a href="case-studies-details.html">ANTIMICROBIAL WALL CLADDING</a></h3>
                                <p>Revolutionise and protect your workspace with antimicrobial wall cladding from BioClad®. </p>
                                <a href="#" class="read-more-btn">
                                    <span class="left"><i class="fa fa-chevron-circle-right"></i></span>
                                    Read More
                                    <span class="right"><i class="fa fa-chevron-circle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 p-0">
                <div class="case-studies-box">
                    <div class="row m-0">
                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="case-studies-img">
                                <a href="#"><img src="{{ URL::asset('frontend/assets/img/case-studies-img2.jpg') }}" alt="case-studies"></a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="case-studies-content">
                                <h3><a href="case-studies-details.html">HYGIENIC WALL PROTECTION</a></h3>
                                <p>When fully protecting a workspace and ensuring that your working environment offers </p>
                                <a href="#" class="read-more-btn">
                                    <span class="left"><i class="fa fa-chevron-circle-right"></i></span>
                                    Read More
                                    <span class="right"><i class="fa fa-chevron-circle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 p-0">
                <div class="case-studies-box">
                    <div class="row m-0">
                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="case-studies-content pb-25">
                                <h3><a href="#">SAFETY FLOORING</a></h3>
                                <p>If you’re concerned about ensuring your working environment is completely safe and hygienic,</p>
                                <a href="#" class="read-more-btn">
                                    <span class="left"><i class="fa fa-chevron-circle-right"></i></span>
                                    Read More
                                    <span class="right"><i class="fa fa-chevron-circle-right"></i></span>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="case-studies-img">
                                <a href="#"><img src="{{ URL::asset('frontend/assets/img/case-studies-img3.jpg') }}" alt="case-studies"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 p-0">
                <div class="case-studies-box">
                    <div class="row m-0">
                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="case-studies-content pb-25">
                                <h3><a href="#">HYGIENIC WALL CLADDING</a></h3>
                                <p>Our standard white wall panel is a high quality, hygienic wall cladding system</p>
                                <a href="#" class="read-more-btn">
                                    <span class="left"><i class="fa fa-chevron-circle-right"></i></span>
                                    Read More
                                    <span class="right"><i class="fa fa-chevron-circle-right"></i></span>
                                </a>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="case-studies-img">
                                <a href=""><img src="{{ URL::asset('frontend/assets/img/case-studies-img4.jpg') }}" alt="case-studies"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Case Studies Area -->



<!-- Start Quick Query and Fun Fact Area -->
<section class="query-and-funFacts">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="query-contact">
                    <div class="query-border"></div>
                    <h4>Need a Quick Query</h4>
                    <form>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="number" id="number" placeholder="Number">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" cols="30" rows="4" class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">Submit a Query</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="fun-facts">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="funFact">
                                <div class="icon">
                                    <img src="{{ URL::asset('frontend/assets/img/ico1.png') }}" alt="smile">
                                </div>

                                <h2><span class="count">200</span>+</h2>
                                <p>Installation</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="funFact">
                                <div class="icon">
                                    <img src="{{ URL::asset('frontend/assets/img/ico2.png') }}" alt="trophy">
                                </div>

                                <h2><span class="count">9</span>+</h2>
                                <p>Years of Experince</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="funFact">
                                <div class="icon">
                                    <img src="{{ URL::asset('frontend/assets/img/ico3.png') }}" alt="shield">
                                </div>

                                <h2 class="count">347855</h2>
                                <p>Square Feet</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="funFact">
                                <div class="icon">
                                    <img src="{{ URL::asset('frontend/assets/img/ico4.png') }}" alt="employee">
                                </div>

                                <h2><span class="count">5</span>+</h2>
                                <p>Countries Serviced</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection