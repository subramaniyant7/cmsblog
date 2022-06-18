@extends('frontend.layout')

@php
    $pageData = json_decode(json_encode($pageContent[0]),true);
@endphp

@section('content')

{!! $pageContent[0]->page_content !!}

@stop
