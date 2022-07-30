@extends('admin.layout')


@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Documents</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Documents</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @include('admin.notification')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-2 float-right">
                                <a href="{{ url(ADMINURL . '/managedocument') }}" class="btn btn-block btn-primary">
                                    <i class="nav-icon fas fa-plus"></i> Create
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Document</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($documents as $k => $category)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->document_desc }}</td>

                                        <td> <a href="{{ URL::asset('uploads/documents/docs/'.$category->document_name) }}" target="_blank">
                                                <img src="{{ URL::asset('frontend/assets/img/pdf.jpg') }}">&nbsp;&nbsp;
                                                <strong>{{ $category->document_name }}</strong><br>
                                            </a>
                                        </td>
                                        <td>{{ statustype()[$category->status - 1] }}</td>
                                        <td>
                                            <a href="{{ url(ADMINURL . '/actiondocument/edit/' . encryption($category->document_id)) }}">
                                                <i class="nav-icon fas fa-pencil-alt" style="margin-right:1em"></i>
                                            </a>
                                            <a href="{{ url(ADMINURL . '/actiondocument/delete/' . encryption($category->document_id)) }}">
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