@extends('frontend.layout')


@section('content')
<section class="contact-area ptb-80">
    <div class="container">
        <div class="row">
        @if (session('success'))
                            <div class="alert alert-success alert-dismissable">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissable">
                                {{ session('error') }}
                            </div>
                            @endif
            <div class="col-lg-12 col-md-12">
                <div class="welcome-text">
                    <h4>CONTACT US</h4>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="map-box">
                    <!-- Map Area -->
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15547.69206438254!2d80.1649518!3d13.0405721!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x328298beaa1ee890!2sGoHealthe%20Services%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1655475690449!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                    <!-- End Map Area -->

                    <div class="contact-info">
                        <div class="info-box">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>

                            <div class="content">
                                <h5>Address</h5>
                                <p>#3, First Floor, 4th street Ganesh Nagar, <br>
                                    GK Industrial Estate, <br>
                                    Alappakam Main Road Porur, <br>
                                    Chennai - 600 016 </p>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="icon">
                                <i class="fa fa-mobile"></i>
                            </div>




                            <div class="content">
                                <h5>Phone</h5>
                                <p>Landline: <a href="mailto:+91 44 42810141 ">+91 44 42810141</a></p>
                                <p>Mobile: <a href="mailto:+91 94426 38379 ">+91 94426 38379</a></p>
                            </div>
                        </div>

                        <div class="info-box mb-0">
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>

                            <div class="content">
                                <h5>Email</h5>
                                <p><a href="#"><span class="__cf_email__">admin@gohealthe.com </span></a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="get-in-touch">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="text">
                                <h4 class="title">Get In Touch With Us</h4>
                                <p>For general questions, please send us a message and we’ll get right back to you. You can also call us directly to speak with a member of our service team or insurance expert.</p>
                                <span>Fields marked with a (*) are required.</span>
                            </div>

                            <div class="stay-connected">
                                <h4 class="title">Stay Connected</h4>
                                <ul>
                                    <li>
                                        <a href="{{ isset($socialMedia[0]) ? $socialMedia[0]->facebook : '#' }}" target="_blank">
                                            <i class="fa fa-facebook"></i>

                                            <span>Facebook</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ isset($socialMedia[0]) ? $socialMedia[0]->twitter : '#' }}">
                                            <i class="fa fa-twitter"></i>

                                            <span>Twitter</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ isset($socialMedia[0]) ? $socialMedia[0]->linkedin : '#' }}">
                                            <i class="fa fa-linkedin"></i>

                                            <span>Linkedin</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ isset($socialMedia[0]) ? $socialMedia[0]->instagram : '#' }}">
                                            <i class="fa fa-vimeo"></i>

                                            <span>Instagram</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            
                            <form id="contactForm" action="{{FRONTENDURL.'contactus'}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name*</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email*</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="" required data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="number">Phone Number*</label>
                                            <input type="text" class="form-control" name="number" id="number" placeholder="" required data-error="Please enter your number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="" required data-error="Write your message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop