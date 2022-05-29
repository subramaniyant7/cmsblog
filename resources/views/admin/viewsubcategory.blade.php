@extends('admin.layout')


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sub-Category Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sub-Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-2 float-right">
                                    <a href="{{ url(ADMINURL . '/managesubcategory') }}" class="btn btn-block btn-primary">
                                        <i class="nav-icon fas fa-plus"></i> Create
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>SubCategory Name</th>
                                            <th>Created By</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subcategoryDetails as $k => $subcategory)
                                            <tr>
                                                <td>{{ $k+1 }}</td>
                                                <td>{{ $subcategory->sub_category_name }}</td>
                                                <td>{{ $subcategory->created_name }}</td>
                                                <td>{{ statustype()[$subcategory->status - 1] }}</td>
                                                <td>
                                                    <a
                                                        href="{{ url(ADMINURL . '/actionsubcategory/edit/' . encryption($subcategory->sub_category_id)) }}">
                                                        <i class="nav-icon fas fa-pencil-alt" style="margin-right:1em"></i>
                                                    </a>
                                                    <a
                                                        href="{{ url(ADMINURL . '/actionsubcategory/delete/' . encryption($subcategory->sub_category_id)) }}">
                                                        <i class="nav-icon fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" style="text-align: center">No Record Found</td>
                                            </tr>
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
