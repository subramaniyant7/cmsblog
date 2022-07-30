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
                        <a href="{{ URL::asset('uploads/documents/docs/'.$docCategory->document_name) }}" target="_blank">
                            <img src="{{ URL::asset('frontend/assets/img/pdf.jpg') }}">&nbsp;&nbsp;
                            <strong>{{ $docCategory->document_name }}</strong><br>
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