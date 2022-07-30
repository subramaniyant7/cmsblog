@extends('admin.layout')


@section('content')
<div class="content-wrapper custom">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Action Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Action Category</li>
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

                        <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/savedoccategorydetails') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name <span class="label-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputEmail3" name="doc_category_name" required value="{{ isset($action) && $action == 'edit' ? $data[0]->doc_category_name : old('doc_category_name') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category Image <span class="label-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="doc_category_img" {{ isset($data) && count($data) && $data[0]->doc_category_img != '' ? '' : 'required'}}>
                                        <span style="color: #f82e2e;font-size: 11px;">*Supported format jpeg, jpg, png only</span>
                                        @if(isset($data) && count($data) && $data[0]->doc_category_img != '')
                                        <img src="{{ URL::asset('uploads/documents/image/'.$data[0]->doc_category_img) }}" style="width:250px">
                                        @endif
                                    </div>

                                </div>

                                @if (isset($data[0]))
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status </label>
                                    <div class="col-sm-6">

                                        <select class="custom-select form-control" name="status">
                                            <option value="">Select</option>
                                            @foreach (statustype() as $s => $status)
                                            <option value="{{ $s+1 }}" {{ $data[0]->status == $s+1 ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <input type="hidden" name="edit_category_img" value="{{ isset($data) && count($data) ? $data[0]->doc_category_img : '' }}">
                            <input type="hidden" class="form-control mb-10" name="doc_category_id" value="{{ isset($action) && $action == 'edit' ? encryption($data[0]->doc_category_id) : '' }}">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <a href={{url(ADMINURL.'/viewdoccategories')}} class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


@stop