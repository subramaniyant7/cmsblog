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
                        <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/saveproductpageinfo') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @if(count($pagecontent))
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Copy Page URL</label>
                                    <div class="col-sm-9">

                                        @php
                                        $url = FRONTENDURL.decryption(request()->page).'/products/'.decryption(request()->type);
                                        @endphp
                                        <i style="cursor:pointer" url="{{$url}}" title="Copy" class="fa fa-2x fa-copy" onclick="copyToClipboard(this.getAttribute('url'))"></i>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Content <span class="label-danger">*</span></label>
                                        <textarea class="summernote" name="product_content">
                                        {{ count($pagecontent) ? $pagecontent[0]->product_content : old('product_content') }}
                                        </textarea>
                                    </div>
                                </div>


                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">About Product <span class="label-danger">*</span></label>
                                        <textarea class="summernote" name="product_about">
                                        {{ count($pagecontent) ? $pagecontent[0]->product_about : old('product_about') }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Technical Profile <span class="label-danger">*</span></label>
                                        <textarea class="summernote" name="product_techincal_profile" required>
                                        {{ count($pagecontent) ? $pagecontent[0]->product_techincal_profile : old('product_techincal_profile') }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Techinal Documents <span class="label-danger">*</span></label>
                                        <input type="file" name="product_techincal_document1" {{ count($pagecontent) && $pagecontent[0]->product_techincal_document1 != '' ? '' : 'required'}}>
                                        @if(count($pagecontent) && $pagecontent[0]->product_techincal_document1 != '')
                                        <a href="{{ URL::asset('uploads/products/docs/'.$pagecontent[0]->product_techincal_document1) }}" target="_blank"> <img src="{{ URL::asset('frontend/assets/img/pdf.jpg') }}">&nbsp;&nbsp;
                                            <strong>{{ $pagecontent[0]->product_techincal_document1 }}</strong><br>
                                        </a>
                                        @endif

                                        <input type="file" name="product_techincal_document2" {{ count($pagecontent) && $pagecontent[0]->product_techincal_document2 != '' ? '' : 'required' }}>
                                        @if(count($pagecontent) && $pagecontent[0]->product_techincal_document2 != '')
                                        <a href="{{ URL::asset('uploads/products/docs/'.$pagecontent[0]->product_techincal_document2) }}" target="_blank"> <img src="{{ URL::asset('frontend/assets/img/pdf.jpg') }}">&nbsp;&nbsp;
                                            <strong>{{ $pagecontent[0]->product_techincal_document2 }}</strong><br>
                                        </a>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Joint Details <span class="label-danger">*</span></label>
                                        <textarea class="summernote" name="product_joint_details">
                                        {{ count($pagecontent) ? $pagecontent[0]->product_joint_details : old('product_joint_details') }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label">Colours & Finishes <span class="label-danger">*</span></label>
                                        <textarea class="summernote" name="product_colours_finishes">
                                        {{ count($pagecontent) ? $pagecontent[0]->product_colours_finishes : old('product_colours_finishes') }}
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
                            <input type="hidden" name="product_subpagename" value={{ request()->type }}>
                            <input type="hidden" name="product_pagename" value={{ request()->page }}>
                            <input type="hidden" name="editproduct_techincal_document1" value="{{ count($pagecontent) ? $pagecontent[0]->product_techincal_document1 : '' }}">
                            <input type="hidden" name="editproduct_techincal_document2" value="{{ count($pagecontent) ? $pagecontent[0]->product_techincal_document2 : '' }}">
                            <input type="hidden" name="product_id" value="{{ count($pagecontent) ? encryption($pagecontent[0]->product_id) : '' }}">
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
        $('.summernote').summernote({
            tabsize: 2,
            height: 300
        })
    })
</script>

@stop