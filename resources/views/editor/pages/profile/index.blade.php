@extends('editor.layout.editor')

@section('content')
<!-- Start container-fluid -->
<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Editor Profile</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div>
                <h5 class="font-14">Update Profile</h5>
                <form method="POST" action="{{ Route('editor.updateProfile') }}" enctype="multipart/form-data">
                    @csrf
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        <span>
                            {{ Session::get('message') }}
                        </span>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="Email">Profile</label>
                        <input type="file" name="profile" class="form-control" accept="image/*">
                        @error('profile')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="FullName">Name</label>
                        <input type="text" name="name" placeholder="Heeny"
                            value="{{ auth()->guard('editor')->user()->name }}" class="form-control">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="text">Website Link</label>
                        <input type="url" name="website_link"
                            value="{{ auth()->guard('editor')->user()->profile ? auth()->guard('editor')->user()->profile->website_link : old('website_link') }}"
                            placeholder="http:://facebook.com" class="form-control">
                        @error('website_link')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="text">About Me</label>
                        <textarea name="about_me" id="" cols="30" rows="10"
                            class="form-control">{{ auth()->guard('editor')->user()->profile ? auth()->guard('editor')->user()->profile->about_me : old('about_me') }}</textarea>
                        @error('about_me')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="btn btn-primary waves-effect waves-light width-md" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>
<!-- end container-fluid -->

@endsection
