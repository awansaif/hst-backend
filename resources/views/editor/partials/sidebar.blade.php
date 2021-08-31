<div class="left-side-menu">


    <div class="user-box">
        <div class="float-left">
            <img src="{{ auth()->guard('editor')->user()->profile?  asset('storage/'.auth()->guard('editor')->user()->profile->avatar_path) : 'https://ui-avatars.com/api/?background=303030&color=f1f1f1&name=Editor' }}"
                alt="" class="avatar-md rounded-circle">
        </div>
        <div class="user-info">
            <a href="#">
                {{ auth()->guard('editor')->user()->name }}
            </a>
            <p class="text-muted m-0">Editor</p>
        </div>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Navigation</li>

            <li>
                <a href="{{ Route('editor.dashboard') }}">
                    <i class=" ti-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="ti-pencil-alt"></i>
                    <span> Blog </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ Route('editor.blogs.index') }}">Blogs</a>
                    </li>
                    <li>
                        <a href="{{ Route('editor.blogs.create') }}">Add New</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
</div>
