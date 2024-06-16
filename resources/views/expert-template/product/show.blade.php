@extends('expert-template.layout.index')
@section('meta')
    
<title>{{$product->name}} | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="{!! $product->description !!}">

<meta property="og:locale" content="en_GB" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{!! $product->name !!} | {{@$product->category->name}} | {{@$product->brand->name}} | {{@$product->city->name}}" />
<meta property="og:description" content="{!! $product->description !!}" />
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:site_name" content="expertsalezone.com" />
<meta property="article:publisher" content="{{url(App\Models\Setting::facebook())}}" />
<meta property="og:image" content="{{asset($product->images->first()->image)}}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{!! $product->name !!} | {{@$product->category->name}} | {{@$product->brand->name}} | {{@$product->city->name}}" />
<meta name="twitter:description" content="{!! $product->description !!}" />
<meta name="twitter:image" content="{{asset($product->images->first()->image)}}" />
@endsection

@section('content')
<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
	<div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
	  <nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
		  <li class="breadcrumb-item"><a class="text-nowrap" href="{{url('/')}}"><i class="ci-home"></i>Home</a></li>
		  <li class="breadcrumb-item text-nowrap"><a href="{{url('products')}}">Products</a>
		  </li>
		  <li class="breadcrumb-item text-nowrap active" aria-current="page">{{$product->name}}</li>
		</ol>
	  </nav>
	</div>
	<div class="order-lg-1 pe-lg-4 text-center text-lg-start">
	  <h1 class="h3 text-light mb-2">{{$product->name}} - {{$product->category->name}} ({{$product->brand->name}})</h1>
	</div>
  </div>
</div>
<div class="container">
  <div class="bg-light shadow-lg rounded-3">
	<!-- Tabs-->
	<ul class="nav nav-tabs" role="tablist">
	  <li class="nav-item"><a class="nav-link py-4 px-sm-4 active" href="#general" data-bs-toggle="tab" role="tab">General <span class='d-none d-sm-inline'>Info</span></a></li>
	</ul>
	<div class="px-4 pt-lg-3 pb-3 mb-5">
	  <div class="tab-content px-lg-3">
		<!-- General info tab-->
		<div class="tab-pane fade show active" id="general" role="tabpanel">
		  <div class="row">
			<!-- Product gallery-->
			<div class="col-lg-7 pe-lg-0">
			  <div class="product-gallery">
				<div class="product-gallery-preview order-sm-2">
				@foreach($product->images as $key => $product_image)
				  <div class="product-gallery-preview-item {{$key == 0 ? 'active' : ''}}" id="product_{{$product_image->id}}">
					<img class="image-zoom" src="{{asset($product_image->image)}}" data-zoom="{{asset($product_image->image)}}" alt="Product image">
					<div class="image-zoom-pane"></div>
				  </div>
				  @endforeach
				</div>
				<div class="product-gallery-thumblist order-sm-1">
					@foreach($product->images as $key => $image)
					<a class="product-gallery-thumblist-item active" href="#product_{{$image->id}}">
						<img src="{{asset($image->image)}}" alt="Product thumb">
					</a>
					@endforeach
				</div>
			  </div>
			</div>
			<!-- Product details-->
			<div class="col-lg-5 pt-4 pt-lg-0">
			  <div class="product-details ms-auto pb-3">
				<div class="h3 fw-normal text-accent mb-3 me-1">PKR {{$product->price}}</div>
				<!-- Product panels-->
				
				<div class="mb-3 d-flex align-items-center">
					<a href="{{route('user.product.order',$product->id)}}" class="btn btn-primary btn-shadow d-block w-100">
						<i class="ci-cart fs-lg me-2"></i>Add to Cart
					</a>
				  </div>
				<div class="accordion mb-4" id="productPanels">
				  <div class="accordion-item">
					<h3 class="accordion-header"><a class="accordion-button" href="#shippingOptions" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions"><i class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Product Description</a></h3>
					<div class="accordion-collapse collapse show" id="shippingOptions" data-bs-parent="#productPanels">
					  <div class="accordion-body fs-sm">
						<div class="d-flex justify-content-between border-bottom pb-2">
						  <p>{{$product->description}}</p>
						</div>
					  </div>
					</div>
				  </div>
				</div>
				<!-- Sharing-->
				<label class="form-label d-inline-block align-middle my-2 me-3">Share:</label>
				<a class="btn-share btn-twitter me-2 my-2" href="https://twitter.com/intent/tweet?text={{$product->name}}&url={{Request::url()}}"><i class="ci-twitter"></i>Twitter</a>
				<a class="btn-share btn-instagram me-2 my-2" href="https://wa.me/?text=={{Request::url()}}&via=expertsalezone.com"><i class="ci-whatsapp"></i>Whatsapp</a>
				<a class="btn-share btn-facebook my-2" href="https://www.facebook.com/sharer.php?u={{Request::url()}}"><i class="ci-facebook"></i>Facebook</a>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
@endsection