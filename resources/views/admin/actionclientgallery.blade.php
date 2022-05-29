@extends('admin.layout')


@section('content')
<div class="content-wrapper custom">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Action Client Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Action Client Gallery</li>
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
                        <form class="form-horizontal" method="POST" action="{{ url(ADMINURL.'/saveclientgallerydetails') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name <span class="label-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="custom-select form-control" name="clients_gallery_category" required onchange="getCategoryClient(this.value)">
                                            <option value="">Select</option>
                                            @foreach (getActiveRecord('category_details') as $category)
                                            <option value="{{ $category->category_id }}" {{ isset($data[0]) && $data[0]->clients_gallery_category == $category->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Client Name <span class="label-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="custom-select form-control" name="clients_gallery_client" required>
                                            <option value="">Select</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Sub-Category Name </label>
                                    <div class="col-sm-9">
                                        <select class="custom-select form-control" name="clients_gallery_subcategory">
                                            <option value="">Select</option>
                                            @foreach (getActiveRecord('sub_category') as $subcategory)
                                            <option value="{{ $subcategory->sub_category_id }}" 
                                                {{ isset($data[0]) && $data[0]->clients_gallery_subcategory == $subcategory->sub_category_id ? 'selected' : '' }}>
                                                {{ $subcategory->sub_category_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date <span class="label-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="clients_gallery_date" required 
                                            value="{{ isset($action) && $action == 'edit' ? $data[0]->clients_gallery_date : old('clients_gallery_date') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Location <span class="label-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="clients_gallery_location" required 
                                            value="{{ isset($action) && $action == 'edit' ? $data[0]->clients_gallery_location : old('clients_gallery_location') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Budget <span class="label-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="clients_gallery_budget" required 
                                            value="{{ isset($action) && $action == 'edit' ? $data[0]->clients_gallery_budget : old('clients_gallery_budget') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description <span class="label-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea id="summernote" name="clients_gallery_description">
                                        {{ isset($action) && $action == 'edit' ? $data[0]->clients_gallery_description : old('clients_gallery_description') }}
                                        </textarea>

                                    </div>
                                </div>
                                @php
                                    $getClientGallery = isset($data[0]) ? checkImageExistByGallery($data[0]->clients_gallery_id) : [];
                                    $getVideoGallery = isset($data[0]) ? checkVideoExistByGallery($data[0]->clients_gallery_id) : [];
                                    $imageLimit = count($getClientGallery) ? count($getClientGallery) : 3;
                                @endphp

                                @for ($p=1;$p<=2;$p++) 
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Video {{$p}}</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="clients_gallery_videos_name[]">{{ isset($getVideoGallery[$p-1]) ? trim($getVideoGallery[$p-1]->clients_gallery_videos_name) : ''}}  </textarea>
                                        </div>
                                    </div>
                                @endfor
                                
                               
                                @for ($q=1;$q<=$imageLimit;$q++) 
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Image {{$q}} <span class="label-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control mb-10 gallery_image" name="clients_gallery_images_name[]" value="" {{!isset($getClientGallery[$q-1]) ? 'required' : ''}} >
                                            @if(isset($getClientGallery[$q-1]))
                                                <span><img style="width: 100%;height: 200px;margin-top: 1em;" src="{{ URL::asset('uploads/client/gallery/'.$getClientGallery[$q-1]->clients_gallery_images_name)}}"></span>
                                            @endif
                                        </div>
                                    </div>
                                @endfor
                           

                                <div class="add_image"></div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-5 text-sm-right"></label>
                                        <div class="col-sm-7 text-sm-right">
                                            <button type="button" class="btn btn-primary" onclick="addRow()">Add Additonal Image</button>
                                        </div>
                                    </div>
                                </div>
                                @if (isset($data[0]))
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Status </label>
                                        <div class="col-sm-9">
                                            <select class="custom-select form-control" name="status">
                                                <option value="">Select</option>
                                                @foreach (statustype() as $s => $status)
                                                <option value="{{ $s+1 }}" 
                                                    {{ $data[0]->status == $s+1 ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                @endif
                                
                            </div>
                            <input type="hidden" class="form-control mb-10" name="clients_gallery_id" value="{{ isset($action) && $action == 'edit' ? encryption($data[0]->clients_gallery_id) : '' }}">
                            <input type="hidden" id="clients_gallery_category" value="{{ isset($action) && $action == 'edit' ? $data[0]->clients_gallery_category : '' }}">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <a href={{url(ADMINURL.'/viewclientgallery')}} class="btn btn-danger">Cancel</a>
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