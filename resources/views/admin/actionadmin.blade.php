@extends('admin.layout')


@section('content')
    <div class="content-wrapper custom">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Admin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Admin</li>
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

                            <form class="form-horizontal" method="POST" action="{{ route('createadmin') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Admin Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Name"
                                                name="admin_name" required
                                                value="{{ isset($action) && $action == 'edit' ? $data[0]->admin_name : old('admin_name') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Admin Role</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="admin_role" required>
                                                <option value="">select</option>
                                                @foreach (admintype() as $k => $admin)
                                                    <option value="{{ $k + 1 }}"
                                                        {{ isset($action) && $action == 'edit' && $data[0]->admin_role == $k + 1 ? 'selected' : '' }}>
                                                        {{ $admin }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" class="form-control mb-10" name="admin_id"
                                    value="{{ isset($action) && $action == 'edit' ? encryption($data[0]->admin_id) : '' }}">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <a href={{url(ADMINURL.'/viewadmin')}} class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


@stop
