<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <div class="logo">
                    <span class="l l1"></span>
                    <span class="l l2"></span>
                    <span class="l l3"></span>
                    <span class="l l4"></span>
                    <span class="l l5"></span>
                </div> Modular Admin </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                <li class="active">
                    <a href="#"><i class="fa fa-home"></i> Dashboard </a>
                </li>
                <li class="">
                    <a href="{{url('/admin/member')}}"><i class="fa fa-user"></i> สมาชิก </a>
                </li>
                <li class="">
                    <a href="{{url('/admin/agents')}}"><i class="fa fa-users"></i> ตัวแทนจำหน่าย </a>
                </li>

                <li>
                    <a href="">
                        <i class="fa fa-sitemap"></i> ตั้งค่า
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li class="">
                                <a href="{{url('/admin/products')}}"><i class=""></i> สินค้า </a>
                        </li>
                        <li class="">
                                <a href="{{url('/admin/categories')}}"><i class=""></i> ประเภทสินค้า </a>
                        </li>
                        <li class="">
                            <a href="{{url('/admin/units')}}"><i class=""></i> หน่วยนับสินค้า </a>
                        </li>

                        {{--  <li>
                            <a href="#"> Second Level Item </a>
                        </li>  --}}

                    </ul>
                </li>

                    <li>
                        <a href="">
                            <i class="fa fa-sitemap"></i> ตั้งค่าหน้าต่างแสดงผล
                            <i class="fa arrow"></i>
                        </a>
                        <ul class="sidebar-nav">
                            <li class="">
                                    <a href="{{url('/admin/stp/aboutus')}}"><i class=""></i> เกี่ยวกับเรา </a>
                            </li>
                            <li class="">
                                    <a href="{{url('/admin/stp/contact')}}"><i class=""></i> ติดต่อเรา </a>
                            </li>
                            <li class="">
                                <a href="{{url('/admin/stp/howbuy')}}"><i class=""></i> วิธีการสั่งซื้อสินค้า </a>
                            </li>
                            <li class="">
                                <a href="{{url('/admin/stp/payment')}}"><i class=""></i> วิธีการชำระเงิน </a>
                            </li>
                        </ul>
                    </li>

                <li>
                    <a href="https://github.com/modularcode/modular-admin-html">
                        <i class="fa fa-github-alt"></i> Theme Docs </a>
                </li>
            </ul>
        </nav>
    </div>
    <footer class="sidebar-footer">
        <ul class="sidebar-menu metismenu" id="customize-menu">
            <li>
                <a href="">
                    <i class="fa fa-cog"></i> Customize 
                </a>
            </li>
        </ul>
    </footer>
</aside>
<div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
<div class="mobile-menu-handle"></div>