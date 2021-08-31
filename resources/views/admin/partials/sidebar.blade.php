<div class="left-side-menu">


    <div class="user-box">
        <div class="float-left">
            <img src="{{ asset(auth()->guard('admin')->user()->avatar_path) }}" alt="" class="avatar-md rounded-circle">
        </div>
        <div class="user-info">
            <a href="#">
                {{ auth()->guard('admin')->user()->first_name }}
                {{ auth()->guard('admin')->user()->last_name }}
            </a>
            <p class="text-muted m-0">Administrator</p>
        </div>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Navigation</li>

            <li>
                <a href="{{ Route('admin.dashboard') }}">
                    <i class=" ti-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="ti-light-bulb"></i>
                    <span> Categories </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ Route('admin.categories.index') }}">Categories</a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.categories.create') }}">Add New</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="ti-pencil-alt"></i>
                    <span> Blog </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ Route('admin.blogs.index') }}">Blogs</a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.blogs.create') }}">Add New</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ Route('admin.subscribers') }}">
                    <i class="ti-menu-alt"></i>
                    <span> Subscribers </span>
                </a>
            </li>


            <li>
                <a href="javascript: void(0);">
                    <i class="ti-files"></i>
                    <span> Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ Route('admin.abouts.index') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.members.index') }}">Team Member</a>
                    </li>

                    <li>
                        <a href="{{ Route('admin.contactus.index') }}">Contact Us</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ Route('admin.siteprofiles.index') }}">
                    <i class="mdi mdi-face-profile"></i>
                    <span>Site Profile</span>
                </a>
            </li>


            <li class="menu-title">Editors</li>

            <li>
                <a href="javascript: void(0);">
                    <i class="ti-files"></i>
                    <span>Editor</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ Route('admin.editors.index') }}">Editors</a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.editors.create') }}">Add New</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
</div>
