@extends('admin.layout')


@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Gallery Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Client Gallery</li>
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
                                <a href="{{ url(ADMINURL . '/manageclientgallery') }}" class="btn btn-block btn-primary">
                                    <i class="nav-icon fas fa-plus"></i> Create
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Client Name</th>
                                        <th>Category Name</th>
                                        <th>Sub-Category Name</th>
                                        <th>Location</th>
                                        <th>Total Area</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($clientGallery as $k => $gallery)

                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $gallery->client_name }}</td>
                                        <td>{{ $gallery->category_name }}</td>
                                        <!-- <td>{{ $gallery->sub_category_name }}</td> -->
                                        <td>
                                            @php
                                                $subCategory = json_decode($gallery->clients_gallery_subcategory);
                                                $subCatName = '';
                                                if(count($subCategory)){
                                                    $list = '<ul>';
                                                    foreach($subCategory as $sCat){
                                                        $sCatName = getSubCategoryById($sCat);
                                                        if(count($sCatName)){
                                                            $subCatName = $sCatName[0]->sub_category_name;
                                                        }
                                                        $list .= '<li>'.$subCatName.'</li>';
                                                    }
                                                    $list .= '</ul>';
                                                    echo $list;
                                                }
                                                
                                            @endphp
                                        </td>
                                        <td>{{ $gallery->clients_gallery_location }}</td>
                                        <td>{{ $gallery->clients_gallery_budget }}</td>
                                        <td>{{ $gallery->created_name }}</td>
                                        <td>{{ statustype()[$gallery->status - 1] }}</td>
                                        <td>
                                            <a href="{{ url(ADMINURL . '/actionclientgallery/edit/' . encryption($gallery->clients_gallery_id)) }}">
                                                <i class="nav-icon fas fa-pencil-alt" style="margin-right:1em"></i>
                                            </a>
                                            <a href="{{ url(ADMINURL . '/actionclientgallery/delete/' . encryption($gallery->clients_gallery_id)) }}">
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