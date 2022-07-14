@extends('admin.layout')


@section('content')
<div class="content-wrapper custom">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Downloads</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Downloads</li>
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
                        <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/downloads') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">File <span class="label-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="filename" required value="">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse (File::glob(public_path('uploads/downloads/docs').'/*') as $k => $path)
                                    @php
                                    $name = explode("/",$path);
                                    $url = url(FRONTENDURL.'uploads/downloads/docs/'.end($name));
                                    @endphp
                                    <tr>
                                        <td style="text-align: left;">{{$k+1}}</td>
                                        <td style="text-align: left;">{{end($name)}}</td>
                                        <td style="text-align: left;">
                                            <a href="{{$url}}" target="_blank">
                                                <img src="{{URL::asset(FRONTENDURL.'frontend/assets/img/pdf.jpg')}}"></a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr><td colspan="3" style="text-align:center">No Docs found</td></tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@stop