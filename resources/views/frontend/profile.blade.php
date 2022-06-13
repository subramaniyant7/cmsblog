@extends('frontend.layout')

@section('content')


{!! $profilePage[0]->page_content !!}

<!-- Start Welcome Area -->
<!-- <section class="welcome-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="welcome-text">
                    <h4>PROFILE</h4>
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
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <img src="{{ URL::asset('frontend/assets/img/pgimg1.jpg') }}">
            </div>


            <div class="col-lg-12 col-md-12">
                <p align="justify" style="color:#212529;">
                    BioClad® are a hygienic cladding supplier and a market leader in creating hygienic spaces for some of the largest brands in the health, food, education, leisure and pharmaceutical sectors.
                    <br><br>
                    With a reputation for delivering quality, BioClad’s ever-expanding portfolio of innovative products includes the likes of antimicrobial wall cladding, hygienic wall cladding, hygienic ceiling cladding, IPS panels, hygienic flooring systems and more. Boasting unique antimicrobial BioCote® technology, our commercial hygiene cladding products are designed to reduce bacteria and microbes to uphold a fully sanitary working environment, keeping people safe – whatever the surroundings.
                    <br><br>
                </p>
            </div>
        </div>
    </div>
</section> -->


<!-- Start Fun Fact Area -->
<section class="funFacts-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="funFact">
                    <div class="icon">
                        <img src="{{ URL::asset('frontend/assets/img/smile.png')}}" alt="smile">
                    </div>

                    <h2><span class="count">200</span>+</h2>
                    <p>CUSTOMERS</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="funFact">
                    <div class="icon">
                        <img src="{{ URL::asset('frontend/assets/img/ico12.png') }}" alt="trophy">
                    </div>

                    <h2><span class="count">10</span>+</h2>
                    <p>PROJECTS PER YEAR</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="funFact">
                    <div class="icon">
                        <img src="{{ URL::asset('frontend/assets/img/ico3.png') }}" alt="shield">
                    </div>

                    <h2><span class="count">347855</span>+</h2>
                    <p>SQ.FT.INSTALLATION</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="funFact">
                    <div class="icon">
                        <img src="{{ URL::asset('frontend/assets/img/ico4.png') }}" alt="employee">
                    </div>

                    <h2><span class="count">5</span>+</h2>
                    <p>COUNTRIES SERVED</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Fun Fact Area -->

@include('frontend.ourteam')
<!-- End Welcome Area -->

@include('frontend.clients')

@endsection