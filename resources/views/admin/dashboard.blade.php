@extends('admin.layout.admin')
@section('content')
<!-- Start container-fluid -->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Welcome !</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div>
                <div class="card-box widget-inline">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 widget-inline-box">
                            <div class="text-center p-3">
                                <h2 class="mt-2">
                                    <i class="text-primary mdi mdi-access-point-network mr-2"></i>
                                    <b>{{ count($editors) }}</b>
                                </h2>
                                <p class="text-muted mb-0">Editors</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 widget-inline-box">
                            <div class="text-center p-3">
                                <h2 class="mt-2">
                                    <i class="text-teal mdi mdi-airplay mr-2"></i>
                                    <b>{{ $blogs }}</b>
                                </h2>
                                <p class="text-muted mb-0">Blogs</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 widget-inline-box">
                            <div class="text-center p-3">
                                <h2 class="mt-2">
                                    <i class="text-info mdi mdi-black-mesa mr-2"></i>
                                    <b>{{ $views }}</b>
                                </h2>
                                <p class="text-muted mb-0">Views</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="text-center p-3">
                                <h2 class="mt-2">
                                    <i class="text-danger mdi mdi-cellphone-link mr-2"></i>
                                    <b>{{ $comments }}</b>
                                </h2>
                                <p class="text-muted mb-0">Comments</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h5 class="mt-0 font-14 mb-3">Editors</h5>
                <div class="table-responsive">
                    <table class="table table-hover mails m-0 table table-actions-bar table-centered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Start Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($editors as $editor)
                            <tr>
                                <td>
                                    {{ $editor->name }}
                                </td>

                                <td>
                                    <a href="#" class="text-muted">
                                        {{ $editor->email }}
                                    </a>
                                </td>

                                <td>
                                    {{ date('d/m/Y', strtotime($editor->created_at)) }}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>
<!-- end container-fluid -->
@endsection
