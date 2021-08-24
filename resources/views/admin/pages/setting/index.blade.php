@extends('admin.layout.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, {{ Auth::guard('admin')->user()->last_name }}!</h4>
                    <span>Setting</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Change Password</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="javascript:void(0)">Password</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">

                @livewire('setting.change-password')
            </div>
        </div>
    </div>
</div>

@endsection
