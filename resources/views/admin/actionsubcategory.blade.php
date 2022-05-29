@extends('admin.layout')


@section('content')
    <div class="content-wrapper custom">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Action Sub-Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Action Sub-Category</li>
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

                            <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/savesubcategorydetails') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Sub-Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3"
                                                name="sub_category_name" required
                                                value="{{ isset($action) && $action == 'edit' ? $data[0]->sub_category_name : old('sub_category_name') }}">
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" class="form-control mb-10" name="sub_category_id"
                                    value="{{ isset($action) && $action == 'edit' ? encryption($data[0]->sub_category_id) : '' }}">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <a href={{url(ADMINURL.'/viewsubcategories')}} class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


@stop
