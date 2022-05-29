@extends('admin.layout')


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Client Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Client</li>
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
                                    <a href="{{ url(ADMINURL . '/manageclient') }}" class="btn btn-block btn-primary">
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
                                            <th>Client Logo</th>
                                            <th>Client Category</th>
                                            <th>Created By</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($clientDetails as $k => $client)
                                            @php
                                                $stClass = ($client->status == 1) ? 'label-success' : 'label-danger';
                                                $stTxt = ($client->status == 1) ? 'Active' : 'label-danger';
                                            @endphp
                                            <tr>
                                                <td>{{ $k+1 }}</td>
                                                <td>{{ $client->client_name }}</td>
                                                <td><img style="height: 100px;" src="{{ URL::asset(ADMINUPLOAD.'/clients/'.$client->client_logo)}}"></td>
                                                <td>{{ $client->category_name }}</td>
                                                <td>{{ $client->created_name }}</td>
                                                <td><span class="label {{ $stClass}}">{{ statustype()[$client->status - 1] }}</span></td>
                                                <td>
                                                    <a
                                                        href="{{ url(ADMINURL . '/actionclient/edit/' . encryption($client->client_id)) }}">
                                                        <i class="nav-icon fas fa-pencil-alt" style="margin-right:1em"></i>
                                                    </a>
                                                    <a
                                                        href="{{ url(ADMINURL . '/actionclient/delete/' . encryption($client->client_id)) }}">
                                                        <i class="nav-icon fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" style="text-align: center">No Record Found</td>
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
