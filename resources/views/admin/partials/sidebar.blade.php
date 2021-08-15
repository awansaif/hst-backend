<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <img src="{{ asset(auth()->guard('admin')->user()->avatar_path) }}" alt="">
            <h5 class="mb-0 fs-20 text-black ">
                <span class="font-w400">Hello,</span>
                {{ auth()->guard('admin')->user()->last_name }}
            </h5>
            <p class="mb-0 fs-14 font-w400">
                {{ auth()->guard('admin')->user()->email }}
            </p>
        </div>
        <ul class="metismenu" id="menu">
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ Route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.categories.index') }}">Categories</a>
                    </li>
                    <li>
                        <a href="tranasactions.html">Blog</a>
                    </li>
                </ul>

            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ Route('admin.subscribers') }}">Subscribers</a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.abouts.index') }}">About Page</a>
                    </li>
                    <li>
                        <a href="{{ Route('admin.members.index') }}">Member</a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="./email-compose.html">Compose</a></li>
                            <li><a href="./email-inbox.html">Inbox</a></li>
                            <li><a href="./email-read.html">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="./app-calender.html">Calendar</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                        <ul aria-expanded="false">
                            <li><a href="./ecom-product-grid.html">Product Grid</a></li>
                            <li><a href="./ecom-product-list.html">Product List</a></li>
                            <li><a href="./ecom-product-detail.html">Product Details</a></li>
                            <li><a href="./ecom-product-order.html">Order</a></li>
                            <li><a href="./ecom-checkout.html">Checkout</a></li>
                            <li><a href="./ecom-invoice.html">Invoice</a></li>
                            <li><a href="./ecom-customers.html">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Widget</span>
                </a>
            </li>
        </ul>
        <div class="copyright">
            <p><strong>Zenix Crypto Admin Dashboard</strong> © 2021 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by DexignZone</p>
        </div>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->
