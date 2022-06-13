@extends('admin.layout')


@section('content')
<div class="content-wrapper custom">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pages</li>
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
                        <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/savepageinfo') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Profile Content <span class="label-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea id="summernote" name="page_content">
                                        {{ count($profilePage) ? $profilePage[0]->page_content : old('page_content') }}
                                        </textarea>
                                    </div>
                                </div>
                               
                            </div>
                            <input type="hidden" name="page_name" value={{ request()->type }}>
                            <input type="hidden" class="form-control mb-10" name="page_id" value="{{ count($profilePage) ? encryption($profilePage[0]->page_id) : '' }}">
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
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 300
        })
    })
</script>

@stop