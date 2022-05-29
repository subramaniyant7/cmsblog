@extends('admin.layout')


@section('content')
<div class="content-wrapper custom">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Action Client Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Action Client Gallery</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <div class="card card-info">

                        <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/saveclientgallerydetails') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Client Name <span class="label-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="custom-select form-control" name="" required>
                                            <option value="">select</option>
                                            @foreach (getActiveRecord('client_details') as $client)
                                            <option value="{{ $client->client_id }}">{{ $client->client_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name <span class="label-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="custom-select form-control" name="" required>
                                            <option value="">select</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Sub-Category Name </label>
                                    <div class="col-sm-6">
                                        <select class="custom-select form-control" name="">
                                            <option value="">select</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Date <span class="label-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="inputEmail3" name="client_name" required value="{{ isset($action) && $action == 'edit' ? $data[0]->client_name : old('client_name') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Location <span class="label-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputEmail3" name="client_name" required value="{{ isset($action) && $action == 'edit' ? $data[0]->client_name : old('client_name') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Budget <span class="label-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputEmail3" name="client_name" required value="{{ isset($action) && $action == 'edit' ? $data[0]->client_name : old('client_name') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Description <span class="label-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputEmail3" name="client_name" required value="{{ isset($action) && $action == 'edit' ? $data[0]->client_name : old('client_name') }}">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control mb-10" name="clients_gallery_id" value="{{ isset($action) && $action == 'edit' ? encryption($data[0]->clients_gallery_id) : '' }}">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <a href={{url(ADMINURL.'/viewclientgallery')}} class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


@stop