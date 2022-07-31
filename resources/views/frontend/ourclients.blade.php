@extends('frontend.layout')


@section('content')

<!-- Start Partner Area -->
<div class="partner-area ptb-80 bg">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h3>Our Clients</h3>
            </div>
            <div class="partner-slider1" style="display: contents">

                @forelse (getActiveRecord('client_details') as $client)
                    <div class="col-lg-2 col-md-2 category-{{ $client->client_id }}">

                            <figure>
                                <a href="#">
                                    <img src="{{ URL::asset('uploads/clients/'.$client->client_logo) }}" alt="portfolio-img">
                                </a>
                            </figure>

                    </div>
                @empty

                @endforelse


            </div>
        </div>
    </div>
</div>
<!-- End Partner Area -->


@stop
