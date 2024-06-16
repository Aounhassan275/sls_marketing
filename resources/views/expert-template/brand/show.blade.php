@extends('expert-template.layout.index')
@section('meta')
    
<title>{{$brand->name}} Products | {{App\Models\Setting::siteName()}}</title>
@endsection

@section('content')
<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
	<div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
	  <nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
		  <li class="breadcrumb-item"><a class="text-nowrap" href="{{url('/')}}"><i class="ci-home"></i>Home</a></li>
		  <li class="breadcrumb-item text-nowrap"><a href="{{url('/brands')}}">Brands</a>
		  </li>
		  <li class="breadcrumb-item text-nowrap active" aria-current="page">{{$brand->name}} Products</li>
		</ol>
	  </nav>
	</div>
	<div class="order-lg-1 pe-lg-4 text-center text-lg-start">
	  <h1 class="h3 text-light mb-2">{{$brand->name}} Products</h1>
	</div>
  </div>
</div>
<section class="container pt-lg-3 mb-4 mb-sm-5">
  <div class="row">
	<!-- Product grid (carousel)-->
	<div class="col-md-12 pt-4 pt-md-0">
		  <div>
			<div class="row mx-n2">
			@foreach($products as $product)
				<div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
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
			  {{$products->links()}}
			</div>
		  </div>
	</div>
  </div>
</section>
@endsection