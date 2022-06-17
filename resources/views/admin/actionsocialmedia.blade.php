@extends('admin.layout')


@section('content')
    <div class="content-wrapper custom">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Action Social Media</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Action Social Media</li>
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

                            <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/social_media') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Facebook</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="facebook" required
                                                value="{{ isset($data[0])  ? $data[0]->facebook : old('facebook') }}">
                                        </div>
                                    </div>

                        
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Twitter</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="twitter" required
                                                value="{{ isset($data[0])  ? $data[0]->twitter : old('twitter') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">LinkedIn</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="linkedin" required
                                                value="{{ isset($data[0])  ? $data[0]->linkedin : old('linkedin') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Instagram</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="instagram" required
                                                value="{{ isset($data[0])  ? $data[0]->instagram : old('instagram') }}">
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" class="form-control mb-10" name="social_media_id"
                                    value="{{ isset($data[0])  ? encryption($data[0]->social_media_id) : '' }}">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


@stop
