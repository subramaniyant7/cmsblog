@extends('frontend.layout')

@php
    $pageData = json_decode(json_encode($pageContent[0]),true);
   
    @endphp
@section('content')

<section class="services-area ptb-80">
    <div class="container">

        <div class="row">
            {!! $pageContent[0]->product_content !!}

            <div class="col-lg-12 col-md-12">
               <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <a data-bs-toggle="collapse" data-bs-parent="#accordionEx" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h5 class="mb-0">
                                    <strong> ABOUT PRODUCT</strong> <i class="fa fa-plus"></i>
                                </h5>
                            </a>
                        </div>

                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-bs-parent="#accordionEx">
                            <div class="card-body">
                                <!-- About -->
                                {!! $pageContent[0]->product_about !!}
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="headingTwo">
                            <a class="collapsed" data-bs-toggle="collapse" data-bs-parent="#accordionEx" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h5 class="mb-0">
                                    <strong>TECHNICAL PROFILE </strong><i class="fa fa-plus"></i>
                                </h5>
                            </a>
                        </div>

                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-bs-parent="#accordionEx">
                            <div class="card-body">
                                <!-- Technical Profile -->
                                {!! $pageContent[0]->product_techincal_profile !!}
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="headingThree">
                            <a class="collapsed" data-bs-toggle="collapse" data-bs-parent="#accordionEx" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h5 class="mb-0">
                                    <strong>TECHNICAL DOCUMENTS</strong><i class="fa fa-plus"></i>
                                </h5>
                            </a>
                        </div>

                        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-bs-parent="#accordionEx">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Files -->
                                        <div class="col-lg-4">
                                            <a href="{{ URL::asset('uploads/products/docs/'.$pageContent[0]->product_techincal_document1) }}" target="_blank"> <img src="{{ URL::asset('frontend/assets/img/pdf.jpg') }}">&nbsp;&nbsp;
                                                <strong>{{ $pageContent[0]->product_techincal_document1 }}</strong><br>
                                              </a>
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="{{ URL::asset('uploads/products/docs/'.$pageContent[0]->product_techincal_document2) }}" target="_blank"> <img src="{{ URL::asset('frontend/assets/img/pdf.jpg') }}">&nbsp;&nbsp;
                                                <strong>{{ $pageContent[0]->product_techincal_document2 }}</strong><br>
                                              </a>
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="headingFour">
                            <a class="collapsed" data-bs-toggle="collapse" data-bs-parent="#accordionEx" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <h5 class="mb-0">
                                    <strong>JOINT DETAILS</strong><i class="fa fa-plus"></i>
                                </h5>
                            </a>
                        </div>

                        <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-bs-parent="#accordionEx">
                            <div class="card-body">
                                <!-- Joint Details -->
                                {!! $pageContent[0]->product_joint_details !!}
                            </div>
                        </div>
                    </div>

                    <div class="card mb-0">
                        <div class="card-header" role="tab" id="headingFive">
                            <a class="collapsed" data-bs-toggle="collapse" data-bs-parent="#accordionEx" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <h5 class="mb-0">
                                    <strong> COLOURS
                                        & FINISHES</strong> <i class="fa fa-plus"></i>
                                </h5>
                            </a>
                        </div>

                        <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive" data-bs-parent="#accordionEx">
                            <div class="card-body">
                                <!-- Colours -->
                                {!! $pageContent[0]->product_colours_finishes !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@stop