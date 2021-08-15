@extends('admin.layout.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, {{ Auth::guard('admin')->user()->last_name }}!</h4>
                    <span>Blog Subscriber</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Subscriber</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="javascript:void(0)">Show</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">

                @livewire('subscriber.index')

            </div>
        </div>
    </div>
</div>

@endsection
