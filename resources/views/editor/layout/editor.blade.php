<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Editor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 editor template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="{{ asset("assets/libs/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("assets/libs/datatables/responsive.bootstrap4.css") }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset("assets/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset("assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("assets/css/app.min.css") }}" rel="stylesheet" type="text/css" id="app-stylesheet" />

    @livewireStyles()
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        @include('editor.partials.navbar')
        @include('editor.partials.sidebar')
        <div class="content-page">
            <div class="content">
                @yield('content')
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2017 - 2020 &copy; Simple theme by <a href="">Coderthemes</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
            <!-- end content -->
        </div>
    </div>
    <!-- Vendor js -->
    <script src="{{ asset("assets/js/vendor.min.js") }}"></script>

    <script src="{{ asset("assets/libs/morris-js/morris.min.js") }}"></script>
    <script src="{{ asset("assets/libs/raphael/raphael.min.js") }}"></script>

    <script src="{{ asset("assets/js/pages/dashboard.init.js") }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset("assets/libs/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/libs/datatables/dataTables.bootstrap4.min.js") }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset("assets/libs/datatables/dataTables.responsive.min.js") }}"></script>
    <script src="{{ asset("assets/libs/datatables/responsive.bootstrap4.min.js") }}"></script>

    <!-- Datatables init -->
    <script src="{{ asset("assets/js/pages/datatables.init.js") }}"></script>
    <!-- App js -->
    <script src="{{ asset("assets/js/app.min.js") }}"></script>
    {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ))

            .catch( error => {
                console.error( error );
            } );
    </script>
    @livewireScripts()
</body>

</html>
