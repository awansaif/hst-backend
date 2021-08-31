@extends('admin.layout.admin')

@section('content')
<!-- Start container-fluid -->
<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">About Us Page</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div>
                <h5 class="font-14">About Us Text</h5>
                @if(Session::has('message'))
                <div class="alert alert-success">
                    <span>{{ Session::get('message') }}</span>
                </div>
                @endif
                <form method="POST" action="{{ Route('admin.abouts.store') }}">
                    @csrf
                    <textarea class="form-control" id="editor" placeholder="About text here ..." name="about"
                        rows="15">{{ $about }}</textarea>
                    @error('about')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
            </div>
            <button class="btn btn-success text-light mt-4">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- end row -->

</div>
<!-- end container-fluid -->

@endsection
