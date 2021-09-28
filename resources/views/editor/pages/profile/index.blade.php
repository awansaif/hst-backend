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
                @livewire('editor.profile.update')
            </div>
        </div>
    </div>
    <!-- end row -->

</div>
<!-- end container-fluid -->

@endsection
