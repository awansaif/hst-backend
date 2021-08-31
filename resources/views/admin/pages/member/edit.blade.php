@extends('admin.layout.admin')

@section('content')
<!-- Start container-fluid -->
<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Team Member</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div>
                <h5 class="font-14">Member</h5>
                @if(Session::has('message'))
                <div class="alert alert-success">
                    <span>{{ Session::get('message') }}</span>
                </div>
                @endif
                <form method="POST" class="mb-2" action="{{ Route('admin.members.update', $member->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="John F Candy" name="name"
                            value="{{ $member->name }}">
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
                    <button class="btn btn-success text-light">Update</button>
                    <a href="{{ Route('admin.members.index') }}" class="btn btn-primary text-light float-right">Back</a>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container-fluid -->

@endsection
