@extends('expert-template.layout.index')
@section('meta')
    
<title>BRANDS | {{App\Models\Setting::siteName()}}</title>
@endsection

@section('content')
<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
	<div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
	  <nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
		  <li class="breadcrumb-item"><a class="text-nowrap" href="{{url('/')}}"><i class="ci-home"></i>Home</a></li>
		  <li class="breadcrumb-item text-nowrap active"><a href="{{url('/brands')}}">Brands</a>
		  </li>
		  {{-- <li class="breadcrumb-item text-nowrap active" aria-current="page">Product Page v.2</li> --}}
		</ol>
	  </nav>
	</div>
	<div class="order-lg-1 pe-lg-4 text-center text-lg-start">
	  <h1 class="h3 text-light mb-2">Brands</h1>
	</div>
  </div>
</div>
<section class="container py-lg-4">
  {{-- <h2 class="h3 text-center pb-4">Shop by Brands</h2> --}}
  <div class="row">
	@foreach($brands as $brand)
	<div class="col-md-3 col-sm-4 col-6">
	  <a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}">
		<img class="d-block mx-auto" src="{{asset($brand->image)}}" style="width: 150px;" alt="{{$brand->name}}">
	  </a>
	</div>
	@endforeach
	{!! $brands->links() !!}
  </div>
</section>
@endsection