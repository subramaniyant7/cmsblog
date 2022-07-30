@extends('frontend.layout')

@section('content')
<!-- Start Partner Area -->
<div class="partner-area ptb-80 bg">
    <div class="container">
        <div class="row">
            <div class="partner-slider">
                @foreach ($docCategory as $docCategory)
                <div class="col-lg-12 col-md-12">
                    <div class="item">
                        <a href="{{ url(FRONTENDURL.'viewdocuments/'.encrypt($docCategory->doc_category_id)) }}">
                            <img src="{{ URL::asset('uploads/documents/image/'.$docCategory->doc_category_img) }}" alt="Document Category">
                            <p>{{ $docCategory->doc_category_name }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Partner Area -->

@stop