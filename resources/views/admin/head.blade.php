<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cpanel | Dashboard </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="{{ URL::asset(FRONTENDURL.ADMIN.'/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset(FRONTENDURL.ADMINCSS.'/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset(FRONTENDURL.ADMINCSS.'/adminlte.min2167.css?v=3.2.0') }}">

    <link rel="stylesheet" href="{{ URL::asset(FRONTENDURL.ADMINCSS.'/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset(FRONTENDURL.ADMINCSS.'/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset(FRONTENDURL.ADMINCSS.'/custom.css') }}">
    <link rel="stylesheet" href="{{ URL::asset(FRONTENDURL.ADMINCSS.'/select2.min.css') }}">
    <script src="{{ URL::asset(FRONTENDURL . ADMIN . '/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset(FRONTENDURL . ADMIN . '/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        let container = "{{FRONTENDURL.'cmsadmin'}}";
    </script>
</head>