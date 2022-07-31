@extends('frontend.layout')


@section('content')

    <section class="welcome-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="welcome-text">
                        <h4>Downloads</h4>
                        <p align="justify">
                        <table class="table1 table table-striped table-bordered" style="font-size:16px; color:#333333;">
                            <thead>
                            <tr>
                                <th style="text-align: left; background-color:#347b87; color:#FFFFFF;">S.No</th>
                                <th style="text-align: left; background-color:#347b87; color:#FFFFFF;">Name</th>
                                <th style="text-align: left; background-color:#347b87; color:#FFFFFF;">Download</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse ($docCategory as $k => $docCategory)
                                <tr>
                                    <td style="text-align: left;">{{$k+1}}</td>
                                    <td style="text-align: left;">{{$docCategory->document_desc}}</td>
                                    <td style="text-align: left;">
                                        <a href="{{ URL::asset('uploads/documents/docs/'.$docCategory->document_name) }}" target="_blank">
                                            <img src="{{ URL::asset('frontend/assets/img/pdf.jpg') }}">&nbsp;&nbsp;

                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" style="text-align:center">No Docs found</td></tr>
                            @endforelse

                            </tbody>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop
