@extends('admin.layout.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, {{ Auth::guard('admin')->user()->last_name }}!</h4>
                    <span>Blog Categories</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Categories</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="javascript:void(0)">Update</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title float-left">Categories</h4>
                        <a href="{{ Route('admin.categories.index') }}" class="btn btn-primary sm">Back</a>
                    </div>
                    <div class="card-body">
                        @livewire('category.edit-category', ['category' => $category])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
