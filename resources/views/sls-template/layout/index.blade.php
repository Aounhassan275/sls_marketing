<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    @yield('meta')
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('expert-template/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('expert-template/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('expert-template/favicon-16x16.png')}}">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="{{asset('expert-template/safari-pinned-tab.svg')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{asset('expert-template/vendor/simplebar/dist/simplebar.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('expert-template/vendor/tiny-slider/dist/tiny-slider.css')}}"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{asset('expert-template/css/theme.min.css')}}">
  	@toastr_css
  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">
    <main class="page-wrapper">
      <!-- Navbar 3 Level (Light)-->
      <header class="shadow-sm">
        <!-- Topbar-->
        <div class="topbar topbar-dark bg-dark">
          <div class="container">
            <div class="topbar-text dropdown d-md-none"><a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Useful links</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="tel:{{App\Models\Setting::phone()}}"><i class="ci-support text-muted me-2"></i>{{App\Models\Setting::phone()}}</a></li>
                {{-- <li><a class="dropdown-item" href="order-tracking.html"><i class="ci-location text-muted me-2"></i>Order tracking</a></li> --}}
              </ul>
            </div>
            <div class="topbar-text text-nowrap d-none d-md-inline-block"><i class="ci-support"></i><span class="text-muted me-1">Support</span><a class="topbar-link" href="tel:{{App\Models\Setting::phone()}}">{{App\Models\Setting::phone()}}</a></div>
            {{-- <div class="ms-3 text-nowrap"><a class="topbar-link me-4 d-none d-md-inline-block" href="order-tracking.html"><i class="ci-location"></i>Order tracking</a>
              <div class="topbar-text dropdown disable-autohide"><a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><img class="me-2" src="{{asset('expert-template/img/flags/en.png')}}" width="20" alt="English">Eng / $</a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li class="dropdown-item">
                    <select class="form-select form-select-sm">
                      <option value="usd">$ USD</option>
                      <option value="eur">€ EUR</option>
                      <option value="ukp">£ UKP</option>
                      <option value="jpy">¥ JPY</option>
                    </select>
                  </li>
                  <li><a class="dropdown-item pb-1" href="#"><img class="me-2" src="{{asset('expert-template/img/flags/fr.png')}}" width="20" alt="Français">Français</a></li>
                  <li><a class="dropdown-item pb-1" href="#"><img class="me-2" src="{{asset('expert-template/img/flags/de.png')}}" width="20" alt="Deutsch">Deutsch</a></li>
                  <li><a class="dropdown-item" href="#"><img class="me-2" src="{{asset('expert-template/img/flags/it.png')}}" width="20" alt="Italiano">Italiano</a></li>
                </ul>
              </div>
            </div> --}}
          </div>
        </div>
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
        <div class="navbar-sticky bg-light">
          <div class="navbar navbar-expand-lg navbar-light">
            <div class="container">
              {{-- <a href="{{url('/')}}"><img src="{{asset('expert-user-panel-template/assets/images/logo.svg')}}" width="25" alt="Aero"><span class="m-l-10">{{App\Models\Setting::siteName()}}</span></a> --}}
              <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="{{url('/')}}">
                {{-- <img src="{{asset('expert-user-panel-template/assets/images/logo.svg')}}" width="25" alt="Expert Sale Zone"> --}}
                <p style="font-size:18px; "><img src="{{asset('expert-user-panel-template/assets/images/logo.svg')}}" width="25" alt="Expert Sale Zone"> Expert Sale Zone</p></a>
              <a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="{{url('/')}}">
                <p>
                  <img src="{{asset('expert-user-panel-template/assets/images/logo.svg')}}" width="25" alt="Expert Sale Zone">Expert Sale Zone</p>
              </a>
              <div class="input-group d-none d-lg-flex mx-4">
                <input class="form-control rounded-end pe-5" type="text" placeholder="Search for products"><i class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
              </div>
              <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Expand menu</span>
                  {{-- <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div></a><a class="navbar-tool d-none d-lg-flex" href="account-wishlist.html"><span class="navbar-tool-tooltip">Wishlist</span> --}}
                  <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i></div></a><a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="{{route('user.login')}}" >
                  <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                  <div class="navbar-tool-text ms-n3"><small>Hello, Sign in</small>My Account</div></a>
                {{-- <div class="navbar-tool dropdown ms-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="shop-cart.html"><span class="navbar-tool-label">4</span><i class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text" href="shop-cart.html"><small>My Cart</small>$265.00</a>
                  <!-- Cart dropdown-->
                  <div class="dropdown-menu dropdown-menu-end">
                    <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                      <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                        <div class="widget-cart-item pb-2 border-bottom">
                          <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                          <div class="d-flex align-items-center"><a class="flex-shrink-0" href="shop-single-v1.html"><img src="{{asset('expert-template/img/shop/cart/widget/01.jpg')}}" width="64" alt="Product"></a>
                            <div class="ps-2">
                              <h6 class="widget-product-title"><a href="shop-single-v1.html">Women Colorblock Sneakers</a></h6>
                              <div class="widget-product-meta"><span class="text-accent me-2">$150.<small>00</small></span><span class="text-muted">x 1</span></div>
                            </div>
                          </div>
                        </div>
                        <div class="widget-cart-item py-2 border-bottom">
                          <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                          <div class="d-flex align-items-center"><a class="flex-shrink-0" href="shop-single-v1.html"><img src="{{asset('expert-template/img/shop/cart/widget/02.jpg')}}" width="64" alt="Product"></a>
                            <div class="ps-2">
                              <h6 class="widget-product-title"><a href="shop-single-v1.html">TH Jeans City Backpack</a></h6>
                              <div class="widget-product-meta"><span class="text-accent me-2">$79.<small>50</small></span><span class="text-muted">x 1</span></div>
                            </div>
                          </div>
                        </div>
                        <div class="widget-cart-item py-2 border-bottom">
                          <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                          <div class="d-flex align-items-center"><a class="flex-shrink-0" href="shop-single-v1.html"><img src="{{asset('expert-template/img/shop/cart/widget/03.jpg')}}" width="64" alt="Product"></a>
                            <div class="ps-2">
                              <h6 class="widget-product-title"><a href="shop-single-v1.html">3-Color Sun Stash Hat</a></h6>
                              <div class="widget-product-meta"><span class="text-accent me-2">$22.<small>50</small></span><span class="text-muted">x 1</span></div>
                            </div>
                          </div>
                        </div>
                        <div class="widget-cart-item py-2 border-bottom">
                          <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                          <div class="d-flex align-items-center"><a class="flex-shrink-0" href="shop-single-v1.html"><img src="{{asset('expert-template/img/shop/cart/widget/04.jpg')}}" width="64" alt="Product"></a>
                            <div class="ps-2">
                              <h6 class="widget-product-title"><a href="shop-single-v1.html">Cotton Polo Regular Fit</a></h6>
                              <div class="widget-product-meta"><span class="text-accent me-2">$9.<small>00</small></span><span class="text-muted">x 1</span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                        <div class="fs-sm me-2 py-2"><span class="text-muted">Subtotal:</span><span class="text-accent fs-base ms-1">$265.<small>00</small></span></div><a class="btn btn-outline-secondary btn-sm" href="shop-cart.html">Expand cart<i class="ci-arrow-right ms-1 me-n1"></i></a>
                      </div><a class="btn btn-primary btn-sm d-block w-100" href="checkout-details.html"><i class="ci-card me-2 fs-base align-middle"></i>Checkout</a>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
          <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
            <div class="container">
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Search-->
                <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                  <input class="form-control rounded-start" type="text" placeholder="Search for products">
                </div>
                <!-- Departments menu-->
                <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                  <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#" data-bs-toggle="dropdown"><i class="ci-view-grid me-2"></i>Departments</a>
                    <div class="dropdown-menu px-2 pb-4">
                      <div class="d-flex flex-wrap flex-sm-nowrap">
                        @foreach(App\Models\Category::all()->take(3) as $category)
                        <div class="mega-dropdown-column pt-3 pt-sm-4 px-2 px-lg-3">
                          <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="{{route('category.show',str_replace(' ', '_',$category->name))}}"><img src="{{asset($category->image)}}" alt="{{$category->name}}"></a>
                            <h6 class="fs-base mb-2">{{$category->name}}</h6>
                            <ul class="widget-list">
                              @foreach($category->brands->take(5) as $brand)
                              <li class="widget-list-item mb-1"><a class="widget-list-link" href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}">{{$brand->name}}</a></li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </li>
                </ul>
                <!-- Primary menu-->
                <ul class="navbar-nav">
                  <li class="nav-item dropdown {{Request::is('/')?'active':''}}"><a class="nav-link" href="{{url('/')}}" >Home</a></li>
                  <li class="nav-item dropdown {{Request::is('categories') || Request::is('category/*') ?'active':''}}"><a class="nav-link dropdown-toggle" href="{{url('categories')}}" data-bs-auto-close="outside">Categories</a>
                    <ul class="dropdown-menu">
                      @foreach(App\Models\Category::all()->take(8) as $category)
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="{{route('category.show',str_replace(' ', '_',$category->name))}}">{{$category->name}}</a>
                        @if($category->brands->count() > 0)
                        <ul class="dropdown-menu">
                          @foreach($category->brands->take(6) as $brand)
                          <li><a class="dropdown-item" href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}">{{$brand->name}}</a></li>
                         @endforeach
                        </ul>
                        @endif
                      </li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="nav-item dropdown {{Request::is('brands') || Request::is('brand/*') ?'active':''}}"><a class="nav-link dropdown-toggle" href="{{url('brands')}}"  data-bs-auto-close="outside">Brands</a>
                    <ul class="dropdown-menu">
                      @foreach(App\Models\Brand::all()->take(8) as $brand)
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}">{{$brand->name}}</a>
                        @if($brand->products->count() > 0)
                        <ul class="dropdown-menu">
                          @foreach($brand->products->take(6) as $product)
                          <li><a class="dropdown-item" href="{{route('product.show',str_replace(' ', '_',$product->name))}}">{{$product->name}}</a></li>
                         @endforeach
                        </ul>
                        @endif
                      </li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="nav-item dropdown {{Request::is('products') || Request::is('product/*') ?'active':''}}"><a class="nav-link " href="{{url('products')}}" data-bs-auto-close="outside">Products</a>
                    <ul class="dropdown-menu">
                      @foreach(App\Models\Product::all()->take(8) as $product)
                      <li class=""><a class="dropdown-item " href="{{route('product.show',str_replace(' ', '_',$product->name))}}" >{{$product->name}}</a></li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="nav-item dropdown {{Request::is('contact_us')?'active':''}}"><a class="nav-link dropdown-toggle" href="{{url('contact_us')}}" >Contact Us</a></li>
                  <li class="nav-item dropdown {{Request::is('about_us')?'active':''}}"><a class="nav-link dropdown-toggle" href="{{url('about_us')}}" >About Us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>
      @yield('content')
    </main>
    <!-- Footer-->
    <footer class="footer bg-dark pt-5">
      <div class="container">
        <div class="row pb-2">
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-links widget-light pb-2 mb-4">
              <h3 class="widget-title text-light">Categories</h3>
              <ul class="widget-list">
                @foreach(App\Models\Category::all()->take(10) as $category)
                <li class="widget-list-item"><a class="widget-list-link" href="{{route('category.show',str_replace(' ', '_',$category->name))}}">{{$category->name}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-links widget-light pb-2 mb-4">
              <h3 class="widget-title text-light">Brands</h3>
              <ul class="widget-list">
                @foreach(App\Models\Brand::all()->take(10) as $brand)
                <li class="widget-list-item"><a class="widget-list-link" href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}">{{$brand->name}}</a></li>
                @endforeach 
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget widget-links widget-light pb-2 mb-4">
              <h3 class="widget-title text-light">Products</h3>
              <ul class="widget-list">
                @foreach(App\Models\Product::all()->take(10) as $product)
                <li class="widget-list-item"><a class="widget-list-link" href="{{route('product.show',str_replace(' ', '_',$product->name))}}">{{$product->name}}</a></li>
                @endforeach 
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="pt-5 bg-darker">
        <div class="container">
          <div class="row pb-3">
            <div class="col-md-6 col-sm-6 mb-4">
              <div class="d-flex"><i class="ci-support text-primary" style="font-size: 2.25rem;"></i>
                <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">24/7 customer support</h6>
                  <p class="mb-0 fs-ms text-light opacity-50">Friendly 24/7 customer support</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 mb-4">
              <div class="d-flex"><i class="ci-card text-primary" style="font-size: 2.25rem;"></i>
                <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">Secure online payment</h6>
                  <p class="mb-0 fs-ms text-light opacity-50">We possess SSL / Secure сertificate</p>
                </div>
              </div>
            </div>
          </div>
          <hr class="hr-light mb-5">
          <div class="row pb-2">
            <div class="col-md-6 text-center text-md-start mb-4">
              <div class="text-nowrap mb-4"><a class="d-inline-block align-middle mt-n1 me-3" href="#">
                Expert Sale Zone
                {{-- <img class="d-block" src="{{asset('expert-template/img/footer-logo-light.png')}}" width="117" alt="Expert Sale Zone"> --}}
              </a>
              </div>
              <div class="widget widget-links widget-light">
                <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                  <li class="widget-list-item me-4"><a class="widget-list-link" href="{{url('/')}}">Home</a></li>
                  <li class="widget-list-item me-4"><a class="widget-list-link" href="{{url('categories')}}">Categories</a></li>
                  <li class="widget-list-item me-4"><a class="widget-list-link" href="{{url('brands')}}">Brands</a></li>
                  <li class="widget-list-item me-4"><a class="widget-list-link" href="{{url('products')}}">Products</a></li>
                  <li class="widget-list-item me-4"><a class="widget-list-link" href="{{url('about_us')}}">About Us</a></li>
                  <li class="widget-list-item me-4"><a class="widget-list-link" href="{{url('contact_us')}}">Contact Us</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 text-center text-md-end mb-4">
              <div class="mb-3">
                <a class="btn-social bs-light bs-twitter ms-2 mb-2" href="{{App\Models\Setting::twitter()}}"><i class="ci-twitter"></i></a>
                <a class="btn-social bs-light bs-facebook ms-2 mb-2" href="{{App\Models\Setting::facebook()}}"><i class="ci-facebook"></i></a>
                <a class="btn-social bs-light bs-instagram ms-2 mb-2" href="{{App\Models\Setting::instagram()}}"><i class="ci-instagram"></i></a>
                <a class="btn-social bs-light bs-youtube ms-2 mb-2" href="{{App\Models\Setting::youtube()}}"><i class="ci-youtube"></i></a>
              </div>
              {{-- <img class="d-inline-block" src="{{asset('expert-template/img/cards-alt.png')}}" width="187" alt="Payment methods"> --}}
            </div>
          </div>
          <div class="pb-4 fs-xs text-light opacity-50 text-center text-md-start">© All rights reserved @ <a class="text-light" href="{{url('/')}}" target="_blank" rel="noopener">{{App\Models\Setting::siteName()}}</a></div>
        </div>
      </div>
    </footer>
    <!-- Toolbar for handheld devices (Default)-->
    {{-- <div class="handheld-toolbar">
      <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item" href="account-wishlist.html"><span class="handheld-toolbar-icon"><i class="ci-heart"></i></span><span class="handheld-toolbar-label">Wishlist</span></a><a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span class="handheld-toolbar-label">Menu</span></a><a class="d-table-cell handheld-toolbar-item" href="shop-cart.html"><span class="handheld-toolbar-icon"><i class="ci-cart"></i><span class="badge bg-primary rounded-pill ms-1">4</span></span><span class="handheld-toolbar-label">$265.00</span></a></div>
    </div> --}}
    <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ci-arrow-up">   </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{asset('expert-template/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('expert-template/vendor/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('expert-template/vendor/tiny-slider/dist/min/tiny-slider.js')}}"></script>
    <script src="{{asset('expert-template/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <!-- Main theme script-->
    <script src="{{asset('expert-template/js/theme.min.js')}}"></script>
    @toastr_js
    @toastr_render
    @yield('scripts')
  </body>

<!-- Mirrored from cartzilla.createx.studio/home-fashion-store-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Feb 2023 10:43:35 GMT -->
</html>