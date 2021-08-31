@extends('admin.layout.admin')

@section('content')
<!-- Start container-fluid -->
<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Blog</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div>
                <h5 class="font-14">Add</h5>
                @if(Session::has('message'))
                <div class="alert alert-success">
                    <span>{{ Session::get('message') }}</span>
                </div>
                @endif
                <form method="POST" action="{{ Route('admin.blogs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="This is my first blog .." name="title"
                            value="{{ old('title') }}">
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
                        <select name="editor" id="" class="form-control">

                            <option selected disabled>Choose editor ....</option>

                            @foreach ($editors as $editor)
                            <option style="color: #333" value="{{ $editor->id }}"
                                {{ old('editor') == $editor->id ? 'selected' : '' }}>
                                {{ $editor->name }}
                            </option>
                            @endforeach

                        </select>
                        @error('editor')
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
                            <option style="color: #333" value="0" {{ old('featured') == 0 ? 'selected' : '' }}>Not
                                Featured
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
    <!-- end row -->

</div>
<!-- end container-fluid -->

@endsection
