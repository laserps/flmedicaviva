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
                </div> medivavivacentre </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                <li class="{{$menu=='orders'?'active':''}}">
                    <a href="{{url('/admin/orders')}}"><i class="fa fa-home"></i> คำสั่งซื้อสินค้า </a>
                </li>
                <li class="{{$menu=='users'?'active':''}}">
                    <a href="{{url('/admin/users')}}"><i class="fa fa-user"></i> สมาชิก </a>
                </li>
                <li class="{{$menu=='agents'?'active':''}}">
                    <a href="{{url('/admin/agents')}}"><i class="fa fa-users"></i> ตัวแทนจำหน่าย </a>
                </li>

                <li class="open">
                    <a href="">
                        <i class="fa fa-sitemap"></i> ตั้งค่า
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li class="{{$menu=='products'?'active':''}}">
                                <a href="{{url('/admin/products')}}"><i class=""></i> สินค้า </a>
                        </li>
                        <li class="{{$menu=='categories'?'active':''}}">
                                <a href="{{url('/admin/categories')}}"><i class=""></i> ประเภทสินค้า </a>
                        </li>
                        <li class="{{$menu=='units'?'active':''}}">
                            <a href="{{url('/admin/units')}}"><i class=""></i> หน่วยนับสินค้า </a>
                        </li>
                        <li class="{{$menu=='contacts'?'active':''}}">
                            <a href="{{url('/admin/contacts')}}"><i class=""></i> ข้อมูลติดต่อ </a>
                        </li>

                        {{--  <li>
                            <a href="#"> Second Level Item </a>
                        </li>  --}}

                    </ul>
                </li>

                    <li class="open">
                        <a href="">
                            <i class="fa fa-sitemap"></i> ตั้งค่าหน้าต่างแสดงผล
                            <i class="fa arrow"></i>
                        </a>
                        <ul class="sidebar-nav">
                            <li class="{{$menu=='stp_aboutus'?'active':''}}">
                                    <a href="{{url('/admin/stp/aboutus')}}"><i class=""></i> เกี่ยวกับเรา </a>
                            </li>
                            <li class="{{$menu=='stp_contact'?'active':''}}">
                                    <a href="{{url('/admin/stp/contact')}}"><i class=""></i> ติดต่อเรา </a>
                            </li>
                            <li class="{{$menu=='stp_howbuy'?'active':''}}">
                                <a href="{{url('/admin/stp/howbuy')}}"><i class=""></i> วิธีการสั่งซื้อสินค้า </a>
                            </li>
                            <li class="{{$menu=='stp_payment'?'active':''}}">
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
