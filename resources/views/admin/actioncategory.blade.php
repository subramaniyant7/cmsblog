@extends('admin.layout')


@section('content')
    <div class="content-wrapper custom">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Category</li>
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

                            <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/savecategorydetails') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3"
                                                name="category_name" required
                                                value="{{ isset($action) && $action == 'edit' ? $data[0]->category_name : old('category_name') }}">
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" class="form-control mb-10" name="category_id"
                                    value="{{ isset($action) && $action == 'edit' ? encryption($data[0]->category_id) : '' }}">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <a href={{url(ADMINURL.'/viewcategories')}} class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


@stop
