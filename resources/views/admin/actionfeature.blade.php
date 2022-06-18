@extends('admin.layout')


@section('content')
    <div class="content-wrapper custom">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Action Feature</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Action Feature</li>
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

                            <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/feature') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Installation</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="installation" required
                                                value="{{ isset($data[0])  ? $data[0]->installation : old('installation') }}">
                                        </div>
                                    </div>

                        
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Year of Experience</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="yearofexperience" required
                                                value="{{ isset($data[0])  ? $data[0]->yearofexperience : old('yearofexperience') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Square Feet</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="sqfeet" required
                                                value="{{ isset($data[0])  ? $data[0]->sqfeet : old('sqfeet') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Countries Serviced</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="countryserviced" required
                                                value="{{ isset($data[0])  ? $data[0]->countryserviced : old('countryserviced') }}">
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" class="form-control mb-10" name="feature_id"
                                    value="{{ isset($data[0])  ? encryption($data[0]->feature_id) : '' }}">
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
