@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')


<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(ADMINURL.'/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v3</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ count(getActiveRecord('admin_details')) }}</h3>
                            <p>Admin</p>
                        </div>

                        <a href="{{ADMINURL.'/viewadmin'}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ count(getActiveRecord('category_details')) }}</h3>
                            <p>Category</p>
                        </div>

                        <a href="{{ADMINURL.'/viewcategories'}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ count(getActiveRecord('client_details')) }}</h3>
                            <p>Clients</p>
                        </div>

                        <a href="{{ADMINURL.'/viewclients'}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ count(getActiveRecord('sub_category')) }}</h3>
                            <p>Sub Category</p>
                        </div>

                        <a href="{{ADMINURL.'/viewsubcategories'}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ count(getActiveRecord('clients_gallery')) }}</h3>
                            <p>Gallery</p>
                        </div>

                        <a href="{{ADMINURL.'/viewclientgallery'}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>


</div>


<aside class="control-sidebar control-sidebar-dark">

</aside>

@stop
