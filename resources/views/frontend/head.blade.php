@php
    $title = 'GoHealthe'; 
    $desc = $keywords = $abstract = $topic = $type = $author = $site = $copyright = '';
    if(isset($pageData)){
        $title = $pageData['page_title'];
        $desc = $pageData['page_desc'];
        $keywords = $pageData['page_keyword'];
        $abstract = $pageData['page_abstract'];
        $topic = $pageData['page_topic'];
        $type = $pageData['page_type'];
        $author = $pageData['page_author'];
        $site = $pageData['page_site'];
        $copyright = $pageData['page_copyright'];
    }   
@endphp
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$title}}</title>
    <meta name="description" content="{{$desc}}" />
    <meta name="keywords" content="{{$keywords}}" />
    <meta name="abstract" content="{{$abstract}}" />
    <meta name="page-topic" content="{{$topic}}" />
    <meta name="page-type" content="{{$type}}" />
    <meta name="author" content="{{$author}}" />
    <meta name="site" content="{{$site}}" />
    <meta name="copyright" content="{{$copyright}}" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/bootstrap.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/animate.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/owl.carousel.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/magnific-popup.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/font-awesome.min.css') }}">
    <!-- Classy Nav CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/classy-nav.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/responsive.css') }}">
    <!-- Default Color CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/color/color-default.css') }}">
    <!-- Color Switcher CSS -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/dist/color-switcher.css') }}">

</head>

