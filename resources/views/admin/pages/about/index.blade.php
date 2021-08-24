@extends('admin.layout.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, {{ Auth::guard('admin')->user()->last_name }}!</h4>
                    <span>About Page</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">About Text</a>
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
                        <h4 class="card-title float-left">About Text</h4>
                        <a href="{{ Route('admin.dashboard') }}" class="btn btn-primary sm">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                <span>{{ Session::get('message') }}</span>
                            </div>
                            @endif
                            <form method="POST" action="{{ Route('admin.abouts.store') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" id="editor" placeholder="About text here ..."
                                        name="about" rows="15">{{ $about }}</textarea>
                                    @error('about')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <button class="btn btn-success text-light">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
