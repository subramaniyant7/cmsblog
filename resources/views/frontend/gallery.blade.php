@extends('frontend.layout')

@section('content')


<!-- Start Portfolio Area -->
<section class="portfolio-area ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="welcome-text">
                    <h4>GALLERY</h4>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="shorting-menu">
                    <button class="filter" data-filter="all">View All</button>
                    @foreach ($categories as $category)
                        <button class="filter" data-filter=".category-{{ $category->category_id }}"</button>{{ $category->category_name }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="shorting">
            <div class="row">
                @forelse ($clients as $client)
                    <div class="col-lg-2 col-md-6 mix category-{{ $client->client_category }}">
                        <div class="single-portfolio">
                            <figure>
                                <a href="{{ url('gallerydetails/'.encryption($client->client_id)) }}">
                                    <img src="{{ URL::asset('uploads/clients/'.$client->client_logo) }}" alt="portfolio-img">
                                </a>
                            </figure>
                        </div>
                    </div>
                @empty
                    
                @endforelse
            </div>
        </div>

    </div>
</section>
<!-- End Portfolio Area -->


@stop