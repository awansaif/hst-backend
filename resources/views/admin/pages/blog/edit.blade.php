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
                <h5 class="font-14">Update</h5>
                @if(Session::has('message'))
                <div class="alert alert-success">
                    <span>{{ Session::get('message') }}</span>
                </div>
                @endif
                <form method="POST" action="{{ Route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="This is my first blog .." name="title"
                            value="{{ $blog->title }}">
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
                                {{ $blog->category_id == $category->id ? 'selected' : '' }}>
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
                                {{ $blog->editor_id == $editor->id ? 'selected' : '' }}>
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
                                {{ $blog->isFeatured == 1 ? 'selected' : '' }}>Featured
                            </option>
                            <option style="color: #333" value="0" {{ $blog->isFeatured == 0 ? 'selected' : '' }}>Not
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
                            rows="10">{{ $blog->body }}</textarea>
                        @error('body')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <button class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>
<!-- end container-fluid -->

@endsection
