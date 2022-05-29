@extends('admin.layout')


@section('content')
    <div class="content-wrapper custom">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Client</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Client</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8 offset-md-2">
                        @include('admin.notification')
                        <div class="card card-info">

                            <form class="form-horizontal" method="POST"
                                action="{{ url(ADMINURL . '/saveclientdetails') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Client Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3" name="client_name"
                                                required
                                                value="{{ isset($action) && $action == 'edit' ? $data[0]->client_name : old('client_name') }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Client Logo</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="inputEmail3" name="client_logo"
                                                {{ (isset($action) && $action == 'edit' && $data[0]->client_logo == '') || !isset($data[0]) ?  'required' : '' }}
                                                value="{{ isset($action) && $action == 'edit' ? $data[0]->client_logo : old('client_logo') }}">
                                            <span style="color: #f82e2e;font-size: 11px;">*Supported format jpeg, jpg,
                                                png</span>
                                            @if (isset($action) && $action == 'edit' && $data[0]->client_logo != '')
                                                <span>
                                                    <img src="{{ URL::asset(ADMINUPLOAD.'/clients/' . $data[0]->client_logo) }}"
                                                        alt="Client Logo" style="width:100%;height:200px" />
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <input name="edit_image" type="hidden"
                                        value="{{ isset($action) && $action == 'edit' ? $data[0]->client_logo : '' }}">

                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Client Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="client_category" required>
                                                <option value="">select</option>
                                                @foreach (getActiveRecord('category_details') as $category)
                                                    <option value="{{ $category->category_id }}"
                                                        {{ isset($action) && $action == 'edit' && $data[0]->client_category == $category->category_id ? 'selected' : '' }}>
                                                        {{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    @if (isset($action) && $action == 'edit')
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="status" required>
                                                    <option value="">select</option>
                                                    @foreach (statustype() as $k => $statustype)
                                                    <option value="{{ $k + 1 }}"
                                                        {{ isset($action) && $action == 'edit' && $data[0]->status == $k + 1 ? 'selected' : '' }}>
                                                        {{ $statustype }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    @endif

                                </div>
                                <input type="hidden" class="form-control mb-10" name="client_id"
                                    value="{{ isset($action) && $action == 'edit' ? encryption($data[0]->client_id) : '' }}">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <a href={{ url(ADMINURL . '/viewclients') }} class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


@stop
