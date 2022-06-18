@extends('frontend.layout')


@php
$pageData = json_decode(json_encode($pageContent[0]),true);
@endphp

@section('content')

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
{!! $pageContent[0]->page_content !!}

<!-- Start Quick Query and Fun Fact Area -->
<section class="query-and-funFacts">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="query-contact">
                    <div class="query-border"></div>
                    <h4>Need a Quick Query</h4>

                    <form method="post" action="{{url(FRONTENDURL.'enquiry')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" required id="name" placeholder="Name">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" required id="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="number" required id="number" placeholder="Number">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" cols="30" rows="4" required class="form-control" placeholder="Message"></textarea>
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

                                <h2><span class="count">{{ count($feature) ? $feature[0]->installation: '' }}</span>+</h2>
                                <p>Installation</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="funFact">
                                <div class="icon">
                                    <img src="{{ URL::asset('frontend/assets/img/ico2.png') }}" alt="trophy">
                                </div>

                                <h2><span class="count">{{ count($feature) ? $feature[0]->yearofexperience: '' }}</span>+</h2>
                                <p>Years of Experince</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="funFact">
                                <div class="icon">
                                    <img src="{{ URL::asset('frontend/assets/img/ico3.png') }}" alt="shield">
                                </div>

                                <h2 class="count">{{ count($feature) ? $feature[0]->sqfeet: '' }}</h2>
                                <p>Square Feet</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <div class="funFact">
                                <div class="icon">
                                    <img src="{{ URL::asset('frontend/assets/img/ico4.png') }}" alt="employee">
                                </div>

                                <h2><span class="count">{{ count($feature) ? $feature[0]->countryserviced: '' }}</span>+</h2>
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