@extends('admin.layout')


@section('content')
<div class="content-wrapper custom">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ ucfirst(decryption(request()->type)) }}</h1>
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
                <div class="col-md-12">
                    <div class="card card-info">
                        <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/savepageinfo') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Page Content <span class="label-danger">*</span></label>
                                        <textarea id="summernote" name="page_content">
                                        {{ count($pagecontent) ? $pagecontent[0]->page_content : old('page_content') }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <h1>SEO</h1>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Page Title <span class="label-danger">*</span></label>
                                        <textarea name="page_title" style="width:100%;">{{ count($pagecontent) ? $pagecontent[0]->page_title : old('page_title') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Page Description <span class="label-danger">*</span></label>
                                        <textarea name="page_desc" style="width:100%;">{{ count($pagecontent) ? $pagecontent[0]->page_desc : old('page_desc') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Page Keyword <span class="label-danger">*</span></label>
                                        <textarea name="page_keyword" style="width:100%;">{{ count($pagecontent) ? $pagecontent[0]->page_keyword : old('page_keyword') }}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Page Abstract <span class="label-danger">*</span></label>
                                        <textarea name="page_abstract" style="width:100%;">{{ count($pagecontent) ? $pagecontent[0]->page_abstract : old('page_abstract') }}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Page Topic <span class="label-danger">*</span></label>
                                        <textarea name="page_topic" style="width:100%;">{{ count($pagecontent) ? $pagecontent[0]->page_topic : old('page_topic') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Page Type <span class="label-danger">*</span></label>
                                        <textarea name="page_type" style="width:100%;">{{ count($pagecontent) ? $pagecontent[0]->page_type : old('page_type') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Page Author <span class="label-danger">*</span></label>
                                        <textarea name="page_author" style="width:100%;">{{ count($pagecontent) ? $pagecontent[0]->page_author : old('page_author') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Page Site <span class="label-danger">*</span></label>
                                        <textarea name="page_site" style="width:100%;">{{ count($pagecontent) ? $pagecontent[0]->page_site : old('page_site') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Page Copyright <span class="label-danger">*</span></label>
                                        <textarea name="page_copyright" style="width:100%;">{{ count($pagecontent) ? $pagecontent[0]->page_copyright : old('page_copyright') }}</textarea>
                                    </div>
                                </div>



                            </div>
                            <input type="hidden" name="page_name" value={{ request()->type }}>
                            <input type="hidden" class="form-control mb-10" name="page_id" value="{{ count($pagecontent) ? encryption($pagecontent[0]->page_id) : '' }}">
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