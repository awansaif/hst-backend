@extends('admin.layout.admin')

@section('content')
<!-- Start container-fluid -->
<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Blogs</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div>
                @if(Session::has('message'))
                <div class="alert alert-success">
                    <span>{{ Session::get('message') }}</span>
                </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h5 class="font-14 float-left">Blogs</h5>
                        <a href="{{ Route('admin.blogs.create') }}"
                            class="btn btn-success text-light float-right btn-sm">Add</a>
                    </div>
                </div>
                @livewire('blog.blog-list')
            </div>
        </div>
    </div>
    <!-- end row -->

</div>
<!-- end container-fluid -->

@endsection
