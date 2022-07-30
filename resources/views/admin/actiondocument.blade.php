@extends('admin.layout')


@section('content')
<div class="content-wrapper custom">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Action Document</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Action Document</li>
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

                        <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/savedocument') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name <span class="label-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="custom-select" name="document_category" required>
                                            <option value="">Select</option>
                                            @foreach (getActiveRecord('doc_category') as $category)
                                            <option value="{{ $category->doc_category_id }}" {{ isset($action) && $action == 'edit' && $data[0]->document_category == $category->doc_category_id ? 'selected' : '' }}>
                                                {{ $category->doc_category_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description <span class="label-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="document_desc" required value="{{ isset($action) && $action == 'edit' ? $data[0]->document_desc : old('document_desc') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Document <span class="label-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control" name="document_name" {{ isset($data) && count($data) && $data[0]->document_name != '' ? '' : 'required'}}>
                                        <span style="color: #f82e2e;font-size: 11px;">*Supported format pdf only</span>
                                        @if(isset($data) && count($data) && $data[0]->document_name != '')
                                        <br/><br/>
                                    <a href="{{ URL::asset('uploads/documents/docs/'.$data[0]->document_name) }}" target="_blank">
                                        <img src="{{ URL::asset('frontend/assets/img/pdf.jpg') }}">&nbsp;&nbsp;
                                        <strong>{{ $data[0]->document_name }}</strong><br>
                                    </a>
                                    @endif
                                    </div>
                                   
                                </div>
                                @if (isset($data[0]))
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status </label>
                                    <div class="col-sm-7">

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
                            <input type="hidden" name="edit_document_name" value="{{ isset($data) && count($data) ? $data[0]->document_name : '' }}">
                            <input type="hidden" class="form-control mb-10" name="document_id" value="{{ isset($action) && $action == 'edit' ? encryption($data[0]->document_id) : '' }}">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <a href={{url(ADMINURL.'/viewdocuments')}} class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


@stop