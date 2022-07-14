@extends('frontend.layout')

@php
    $pageData = json_decode(json_encode($pageContent[0]),true);
   
    @endphp
@section('content')

<section class="services-area ptb-80">
    <div class="container">

        <div class="row">
            {!! $pageContent[0]->page_content !!}

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
                                {!! $pageContent[0]->page_about !!}
                            </div>
                        </div>
                    </div>

                  

                </div>
            </div>
        </div>
    </div>
</section>

@stop