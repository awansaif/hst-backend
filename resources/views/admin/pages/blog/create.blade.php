@extends('admin.layout.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, {{ Auth::guard('admin')->user()->last_name }}!</h4>
                    <span>Blog</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Blog</a>
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
                        <h4 class="card-title float-left">Add Blog</h4>
                        <a href="{{ Route('admin.blogs.index') }}" class="btn btn-primary sm">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                <span>{{ Session::get('message') }}</span>
                            </div>
                            @endif
                            <form method="POST" action="{{ Route('admin.blogs.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="This is my first blog .."
                                        name="title" value="{{ old('title') }}">
                                    @error('title')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="file" class="form-control" placeholder="Fashion" name="featured_image">
                                    @error('featured_image')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <select name="category" id="" value="{{ old('category') }}" class="form-control">

                                        <option selected disabled>Choose catgeory ....</option>

                                        @foreach ($categories as $category)
                                        <option style="color: #333" value="{{ $category->id }}"
                                            {{ old('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                        @endforeach

                                    </select>
                                    @error('category')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <select name="featured" id="" value="{{ old('featured') }}" class="form-control">

                                        <option selected disabled>Choose status ....</option>
                                        <option style="color: rgb(126, 114, 114)" value="1"
                                            {{ old('featured') == 1 ? 'selected' : '' }}>Featured
                                        </option>
                                        <option style="color: #333" value="0"
                                            {{ old('featured') == 0 ? 'selected' : '' }}>Not Featured
                                        </option>

                                    </select>
                                    @error('featured')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <textarea name="body" class="form-control" id="editor" cols="30"
                                        rows="10">{{ old('body') }}</textarea>
                                    @error('body')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <button class="btn btn-success">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
