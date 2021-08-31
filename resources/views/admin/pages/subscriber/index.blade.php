@extends('admin.layout.admin')

@section('content')
<!-- Start container-fluid -->
<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Subscribers List</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <h5 class="font-14">Subscribers</h5>
            @livewire('subscriber.index')
        </div>
    </div>
    <!-- end row -->

</div>
<!-- end container-fluid -->

@endsection
