@extends('admin.layout')


@section('content')
    <div class="content-wrapper custom">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Wesbite Images</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Wesbite Images</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.notification')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card card-info">
                            <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/saveuploadimages') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Wesbite Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email"
                                                name="upload_image" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>


                        <!-- <div class="container"> -->
                        <div class="container-fluid">
                            <div class="row">
                            @foreach(File::glob(public_path('uploads/cmspageimages').'/*') as $path)
                                @php
                                    $name = explode("/",$path);
                                    $url = url(FRONTENDURL.'uploads/cmspageimages/'.end($name));
                                @endphp
                                <div class="col-sm-3">
                                    <img style="width:100%;height:100px;" src="{{$url}}">
                                    <div style="padding:1em;" url="{{$url}}" name="{{end($name)}}">
                                        <i style="margin-right:1em;cursor:pointer" url="{{$url}}" title="Copy" class="fa fa-2x fa-copy" onclick="copyToClipboard(this.getAttribute('url'))"></i>
                                        <i style="cursor:pointer" title="Delete"  name="{{end($name)}}" class="fa fa-2x fa-trash" onclick="deleteImage(this.getAttribute('name'))"></i>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

@stop
