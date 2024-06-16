@extends('expert-template.layout.index')
@section('meta')
    
<title>HOME | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
     <!-- Hero slider-->
      <section class="tns-carousel tns-controls-lg mb-4 mb-lg-5">
        <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
          <!-- Item-->
          @foreach(App\Models\Slider::all() as $slider)
          <div class="px-lg-5" style="background-color:{{$slider->color}};">
            <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="{{asset($slider->image)}}" alt="Women Sportswear">
              <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
                <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
                  <h3 class="h2 text-light fw-light pb-1 from-bottom">Hurry Up! Limited time offer.</h3>
                  <h2 class="text-light display-5 from-bottom delay-1">{{$slider->title}}</h2>
                  <p class="fs-lg text-light pb-3 from-bottom delay-2">{{ Illuminate\Support\Str::limit(@$slider->description, 60)}}</p>
                  {{-- <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="{{route('product.index')}}">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i></a></div> --}}
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </section>
      <!-- Category (Women)-->
      <section class="container pt-lg-3 mb-4 mb-sm-5">
        <div class="row">
          @php 
          $top_category_first = App\Models\Category::find(1);
          @endphp
          <!-- Banner with controls-->
          <div class="col-md-5">
            <div class="d-flex flex-column h-100 overflow-hidden rounded-3" style="background-color: #f6f8fb;">
              <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
                <div>
                  <h3 class="mb-1">For {{$top_category_first->name}}</h3><a class="fs-md" href="{{route('category.show',str_replace(' ', '_',$top_category_first->name))}}">Shop for {{$top_category_first->name}}<i class="ci-arrow-right fs-xs align-middle ms-1"></i></a>
                </div>
              </div><a class="d-none d-md-block mt-auto" href="{{route('category.show',str_replace(' ', '_',$top_category_first->name))}}"><img class="d-block w-100" src="{{asset($top_category_first->image)}}" alt="For {{$top_category_first->name}}"></a>
            </div>
          </div>
          <!-- Product grid (carousel)-->
          <div class="col-md-7 pt-4 pt-md-0">
            {{-- <div class="tns-carousel">
              <div class="tns-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#for-women&quot;}"> --}}
                <!-- Carousel item-->
                <div>
                  <div class="row mx-n2">
                    @foreach($top_category_first->products->take(6) as $first_category_product)
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <a class="card-img-top d-block overflow-hidden" href="{{route('product.show',str_replace(' ', '_',$first_category_product->name))}}"><img src="{{asset($first_category_product->images->first()->image)}}" alt="{{$first_category_product->name}}"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="{{route('brand.show',str_replace(' ', '_',$first_category_product->brand->name))}}">{{$first_category_product->brand->name}}</a>
                          <h3 class="product-title fs-sm"><a href="{{route('product.show',str_replace(' ', '_',$first_category_product->name))}}">{{$first_category_product->name}}</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">PKR {{$first_category_product->price}}</span>
                              <del class="fs-sm text-muted">PKR {{$first_category_product->fake_price}}></del>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              {{-- </div>
            </div> --}}
          </div>
        </div>
      </section>
      <!-- Category (Men)-->
      @php 
      $top_category_second = App\Models\Category::find(2);
      @endphp
      <section class="container pt-lg-4 mb-4 mb-sm-5">
        <div class="row">
          <!-- Banner with controls-->
          <div class="col-md-5 order-md-2">
            <div class="d-flex flex-column h-100 overflow-hidden rounded-3" style="background-color: #f6f8fb;">
              <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
                <div class="order-md-2">
                  <h3 class="mb-1">For {{$top_category_second->name}}</h3><a class="fs-md" href="{{route('category.show',str_replace(' ', '_',$top_category_second->name))}}">Shop for {{$top_category_second->name}}<i class="ci-arrow-right fs-xs align-middle ms-1"></i></a>
                </div>
              </div><a class="d-none d-md-block mt-auto" href="{{route('category.show',str_replace(' ', '_',$top_category_second->name))}}"><img class="d-block w-100" src="{{asset($top_category_second->image)}}" alt="For {{$top_category_second->name}}"></a>
            </div>
          </div>
          <!-- Product grid (carousel)-->
          <div class="col-md-7 pt-4 pt-md-0 order-md-1">
            {{-- <div class="tns-carousel">
              <div class="tns-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#for-men&quot;}"> --}}
                <div>
                  <div class="row mx-n2">
                    @foreach($top_category_second->products->take(6) as $second_category_product)
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <a class="card-img-top d-block overflow-hidden" href="{{route('product.show',str_replace(' ', '_',$second_category_product->name))}}"><img src="{{asset($second_category_product->images->first()->image)}}" alt="{{$second_category_product->name}}"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="{{route('brand.show',str_replace(' ', '_',$second_category_product->brand->name))}}">{{$second_category_product->brand->name}}</a>
                          <h3 class="product-title fs-sm"><a href="{{route('product.show',str_replace(' ', '_',$second_category_product->name))}}">{{$second_category_product->name}}</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">PKR {{$second_category_product->price}}</span>
                              <del class="fs-sm text-muted">PKR {{$second_category_product->fake_price}}></del>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              {{-- </div>
            </div> --}}
          </div>
        </div>
      </section>
      <!-- Shop by brand-->
      <section class="container py-lg-4">
        <h2 class="h3 text-center pb-4">Shop by Brands</h2>
        <div class="row">
          @foreach(App\Models\Brand::all()->take(20) as $brand)
          <div class="col-md-3 col-sm-4 col-6">
            <a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}">
              <img class="d-block mx-auto" src="{{asset($brand->image)}}" style="width: 150px;" alt="{{$brand->name}}">
            </a>
          </div>
          @endforeach
        </div>
      </section>
      <hr class="mb-5">
      <!-- Product carousel (You may also like)-->
      <div class="container pt-lg-2 pb-5 mb-md-3">
        <h2 class="h3 text-center pb-4">Products</h2>
        <div class="tns-carousel tns-controls-static tns-controls-outside">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
            <!-- Product-->
            @foreach(App\Models\Product::all()->take(10) as $product)
            <div>
              <div class="card product-card card-static">
                <a class="card-img-top d-block overflow-hidden" href="{{route('product.show',str_replace(' ', '_',$product->name))}}"><img src="{{asset($product->images->first()->image)}}" alt="{{$product->name}}"></a>
                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="{{route('brand.show',str_replace(' ', '_',$product->brand->name))}}">{{$product->brand->name}}</a>
                  <h3 class="product-title fs-sm"><a href="{{route('product.show',str_replace(' ', '_',$product->name))}}">{{$product->name}}</a></h3>
                  <div class="d-flex justify-content-between">
                    <div class="product-price"><span class="text-accent">PKR {{$product->price}}</span>
                      <del class="fs-sm text-muted">PKR {{$product->fake_price}}></del>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <!-- Product-->
          </div>
        </div>
      </div>
@endsection