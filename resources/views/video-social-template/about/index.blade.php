@extends('expert-template.layout.index')
@section('meta')
    
<title>About Us | {{App\Models\Setting::siteName()}}</title>
@endsection

@section('content')
<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
	<div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
	  <nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
		  <li class="breadcrumb-item"><a class="text-nowrap" href="{{url('/')}}"><i class="ci-home"></i>Home</a></li>
		  <li class="breadcrumb-item text-nowrap active"><a href="{{url('about_us')}}">About Us</a>
		  </li>
		  {{-- <li class="breadcrumb-item text-nowrap active" aria-current="page">Product Page v.2</li> --}}
		</ol>
	  </nav>
	</div>
	<div class="order-lg-1 pe-lg-4 text-center text-lg-start">
	  <h1 class="h3 text-light mb-2">About Us</h1>
	</div>
  </div>
</div>
<!-- Row: Shop online-->
<section class="row g-0">
  <div class="col-md-6 bg-position-center bg-size-cover bg-secondary" style="min-height: 15rem; background-image: url({{asset('expert-template/img/about/01.jpg')}});"></div>
  <div class="col-md-6 px-3 px-md-5 py-5">
    <div class="mx-auto py-lg-5" style="max-width: 35rem;">
      <h2 class="h3 pb-3">Search, Select, Buy online</h2>
      <p class="fs-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p><a class="btn btn-primary btn-shadow" href="shop-grid-ls.html">View products</a>
    </div>
  </div>
</section>
<!-- Row: Delivery-->
<section class="row g-0">
  <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2" style="min-height: 15rem; background-image: url({{asset('expert-template/img/about/02.jpg')}});"></div>
  <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
    <div class="mx-auto py-lg-5" style="max-width: 35rem;">
      <h2 class="h3 pb-3">Fast delivery worldwide</h2>
      <p class="fs-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p><a class="btn btn-accent btn-shadow" href="#">Shipping details</a>
    </div>
  </div>
</section>
@endsection