@extends('frontend.layout')


@section('content')


<!-- Start Gallery Details Area -->
<section class="portfolio-details-area ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="welcome-text">
                    <h4>{{ $clientGallery[0]->client_name }}</h4>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="portfolio-details">
                    <div class="portfolio-details-img">
                        @foreach ($galleryAsset['videos'] as $video)
                            {!! $video->clients_gallery_videos_name !!}
                        @endforeach
                    </div>
                    <div class="portfolio-details-content">
                        <h3 class="title">Project Details</h3>
                        <p align="justify"> 
                            {!! $clientGallery[0]->clients_gallery_description !!}
                        </p>

                        <div style="display:flex;justify-content: space-between;">
                            @foreach ($galleryAsset['images'] as $k => $assetImage)
                                @if($k >= 3) 
                                <a href="javascript:void(0)" style="height:300px;width:300px;">
                                    <img src="{{ URL::asset('uploads/clients/gallery/'.$assetImage->clients_gallery_images_name) }}" style="height:100%;width:100%;">
                                </a>
                                @endif
                            @endforeach
                        </div>

                        <div class="related-project">
                            <h3 class="title">Related Projects</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="single-portfolio">
                                        <figure>
                                            <a href="#">
                                                <img src="{{ URL::asset('assets/img/g1.png') }}" alt="portfolio-img">
                                                <span class="list-overlay"></span>
                                            </a>
                                        </figure>
                                        <div class="portfolio-content">
                                            <h4><a href="#">HYGIENIC WALL CLADDING</a></h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="single-portfolio">
                                        <figure>
                                            <a href="#">
                                                <img src="assets/img/g2.png" alt="portfolio-img">
                                                <span class="list-overlay"></span>
                                            </a>

                                            <div class="link-view">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-target="#ModalCenter"><i class="fa fa-arrows-alt"></i></a>
                                            </div>
                                        </figure>

                                        <div class="portfolio-content">
                                            <h4><a href="#">PRINTCLAD</a></h4>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-5">
                <div class="side-bar">
                    <div class="widget project-info">
                        <h3 class="title">Project Information</h3>
                        <img src="{{ URL::asset('uploads/clients/'.$clientGallery[0]->client_logo) }}"><br><br>
                        <ul>
                            <li>Date: <span>{{ date('jS F, Y', strtotime($clientGallery[0]->clients_gallery_date)) }}</span></li>
                            <li>Client Name: <span>{{ $clientGallery[0]->client_name }}</span></li>
                            <li>Location: <span>{{ $clientGallery[0]->clients_gallery_location }}</span></li>
                            <li>Categories: <span>{{ $clientGallery[0]->category_name }}</span></li>
                            <li>Budget: <span>&#36;{{ $clientGallery[0]->clients_gallery_budget }}</span></li>
                        </ul>

                        <br><br>
                        @foreach ($galleryAsset['images'] as $k => $assetImage)
                            @if($k == 3) 
                                @break; 
                            @endif
                            <a href="javascript:void(0)" rel="prettyPhoto[gallery1]">
                                <img src="{{ URL::asset('uploads/clients/gallery/'.$assetImage->clients_gallery_images_name) }}">
                            </a>
                            <br><br><br>
                        @endforeach
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Gallery Details Area -->



@stop