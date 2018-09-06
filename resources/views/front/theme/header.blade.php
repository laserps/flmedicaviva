  <!-- Header Section -->
  <section class="tophead" role="tophead">
    <!-- Navigation Section -->
    <header id="header">
      <div class="header-content clearfix"> <a class="logo" href="index.html"><img class="index_logo" src="{{asset('front/viva/images/logo-viva.png')}}" alt="logo"></a>
        <nav class="navigation" role="navigation">
          <ul class="primary-nav">
            <li><a href="{{url('/')}}">หน้าแรก</a></li>
            <li><a href="{{url('/agent')}}">ตัวแทน</a></li>
            <li><a href="{{url('/product')}}">สินค้า</a></li>
            <li><a href="{{url('/payment')}}">จ่ายเงิน</a></li>
            <li><a href="{{url('/aboutus')}}">เกี่ยวกับเรา</a></li>
            <li><a href="{{url('/contactus')}}">ติดต่อเรา</a></li>
            <li><a href="{{url('/howtobuy')}}">วิธีการซื้อสินค้า</a></li>
            @if(!\Auth::id())
            <li><a href="{{url('/member')}}">สมาชิก</a></li>
            @else
            <li class="add-cart dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                {{str_limit(\Auth::user()->name,6)}}
              </a>
<!--               <ul class="dropdown-menu dropdown-cart" aria-labelledby="dropdownMenu1">
                <li class="cart-header">
                  <div class="shopping-cart-header">
                    <div>
                    <i class="fa fa-shopping-cart cart-icon"></i><span class="drop-cart">3</span>
                    </div>
                    <div class="shopping-cart-total">
                      <label class="lighter-text">Total: $2,229.97</label>
                    </div>
                  </div>
                </li>
              </ul> -->

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">

                  <div class="dropdown-item">
                    <div class="shopping-cart-header">
                      <div style="position:relative; margin-left: 15px;">
                      <div class="" style="width:100%;">
                          <a href="{{url('/editProfile')}}" style="color:red;">123</a>
                      </div>
                      </div>
                      <div class="shopping-cart-total">
                        <label class="lighter-text"><a href="#">123</a></label>
                      </div>
                    </div>
                  </div>

                  <div class="dropdown-item">
                    <div class="shopping-cart-header">
                      <div style="position:relative; margin-left: 15px;">
                      qwe
                      </div>
                      <div class="shopping-cart-total">
                        <label class="lighter-text"><a href="#">123</a></label>
                      </div>
                    </div>
                  </div>

        </div>
            </li>
            @endif
            {{-- <li><a href="authorized.php">ตัวแทน</a></li>
            <li><a href="product.php">สินค้า</a></li>
            <li><a href="payment.php">จ่ายเงิน</a></li>
            <li><a href="about.php">เกี่ยวกับเรา</a></li>
            <li><a href="contact.php">ติดต่อเรา</a></li>
            <li><a href="howtobuy.php">วิธีการซื้อสินค้า</a></li>
            <li><a href="register.php">สมาชิก</a></li> --}}
            <li class="add-cart dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              </a>
              <span>2</span>
<!--               <ul class="dropdown-menu dropdown-cart" aria-labelledby="dropdownMenu1">
                <li class="cart-header">
                  <div class="shopping-cart-header">
                    <div>
                    <i class="fa fa-shopping-cart cart-icon"></i><span class="drop-cart">3</span>
                    </div>
                    <div class="shopping-cart-total">
                      <label class="lighter-text">Total: $2,229.97</label>
                    </div>
                  </div>
                </li>
              </ul> -->

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">

                  <div class="dropdown-item">
                    <div class="shopping-cart-header">
                      <div style="position:relative; margin-left: 15px;">
                      <i class="fa fa-shopping-cart cart-icon"></i><span class="drop-cart">2</span>
                      </div>
                      <div class="shopping-cart-total">
                        <label class="lighter-text">Total: ฿{{sizeof(\Cart::content())>0?\Cart::subtotal():0}}</label>
                      </div>
                    </div>
                  </div>
                  @foreach(\Cart::content() as $k => $v)
                  <div class="dropdown-item">
                    <div class="shopping-cart-header">
                      <div class="row row-drop-cart">
                        <div class="shopping-cart-img">
                          <div class="cart-img-frame">
                          <img src="{{asset('uploads/temp/'.$v->options->img)}}" alt="...">
                          </div>
                        </div>
                        <div class="shopping-cart-info">
                          <div class="shopping-cart-title">
                            <label>{{str_limit($v->name,25)}}</label>
                          </div>
                           <div class="shopping-cart-detail">
                              <label>฿{{$v->price}}</label>
                              <label class="pull-right"> {{$v->qty}} ชิ้น</label>
                           </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                <div class="dropdown-item">
                    <div class="shopping-cart-header">
                      <div class="row row-drop-cart text-center">
                        <button class="btn-ghost btn-green" id="checkout"> Checkout </button>
                      </div>
                  </div>
                </div>
            </li>
          </ul>
        </nav>

        <a href="#" class="nav-toggle">Menu<span></span></a>
      </div>
    </header>

<!--         <div class="shopping-cart-container">
          <div class="shopping-cart">
            <div class="shopping-cart-header">
              <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
              <div class="shopping-cart-total">
                <span class="lighter-text">Total:</span>
                <span class="main-color-text">$2,229.97</span>
              </div>
            </div>

            <ul class="shopping-cart-items">
              <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1" />
                <span class="item-name">Sony DSC-RX100M III</span>
                <span class="item-price">$849.99</span>
                <span class="item-quantity">Quantity: 01</span>
              </li>

              <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item2.jpg" alt="item1" />
                <span class="item-name">KS Automatic Mechanic...</span>
                <span class="item-price">$1,249.99</span>
                <span class="item-quantity">Quantity: 01</span>
              </li>

              <li class="clearfix">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item3.jpg" alt="item1" />
                <span class="item-name">Kindle, 6" Glare-Free To...</span>
                <span class="item-price">$129.99</span>
                <span class="item-quantity">Quantity: 01</span>
              </li>
            </ul>

            <a href="#" class="button">Checkout</a>
          </div>
        </div> -->
    <!-- Navigation Section -->
  </section>
