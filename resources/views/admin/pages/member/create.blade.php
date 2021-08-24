@extends('admin.layout.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, {{ Auth::guard('admin')->user()->last_name }}!</h4>
                    <span>Site Members</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Members</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="javascript:void(0)">Add</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title float-left">Members</h4>
                        <a href="{{ Route('admin.members.index') }}" class="btn btn-success text-light btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                <span>{{ Session::get('message') }}</span>
                            </div>
                            @endif
                            <form method="POST" class="mb-2" action="{{ Route('admin.members.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="John F Candy" name="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="avatar_path" accept="image/*">
                                    @error('avatar_path')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <button class="btn btn-success text-light">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
