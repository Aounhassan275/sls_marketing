@extends('expert-template.layout.index')
@section('meta')
<title>CATEGORIES | {{App\Models\Setting::siteName()}}</title>
@endsection
@section('content')
<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
	<div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
	  <nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
		  <li class="breadcrumb-item"><a class="text-nowrap" href="{{url('/')}}"><i class="ci-home"></i>Home</a></li>
		  <li class="breadcrumb-item text-nowrap active"><a href="{{url('categories')}}">Categories</a>
		  </li>
		  {{-- <li class="breadcrumb-item text-nowrap active" aria-current="page">Product Page v.2</li> --}}
		</ol>
	  </nav>
	</div>
	<div class="order-lg-1 pe-lg-4 text-center text-lg-start">
	  <h1 class="h3 text-light mb-2">Categories</h1>
	</div>
  </div>
</div>
<div class="container pb-4 pb-sm-5">
  <!-- Categories grid-->
  <div class="row pt-5">
	<!-- Catogory-->
	@foreach($categories as $category)
	<div class="col-md-4 col-sm-6 mb-3">
	  <div class="card border-0">
		<a class="d-block overflow-hidden rounded-3" href="{{route('category.show',str_replace(' ', '_',$category->name))}}"><img class="d-block w-100" src="{{asset($category->image)}}" alt="{{$category->name}}"></a>
		<div class="card-body">
		  <h2 class="h5">{{$category->name}}</h2>
		  <ul class="list-unstyled fs-sm mb-0">
			@foreach($category->brands->take(10) as $brand)
			<li class="d-flex align-items-center justify-content-between">
				<a class="nav-link-style" href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}"><i class="ci-arrow-right-circle me-2"></i>{{$brand->name}}</a>
				<span class="fs-ms text-muted">{{$brand->products->count()}}</span>
			</li>
			@endforeach
			<li>...</li>
			<li>
			  <hr>
			</li>
			<li class="d-flex align-items-center justify-content-between"><a class="nav-link-style" href="{{route('category.show',str_replace(' ', '_',$category->name))}}"><i class="ci-arrow-right-circle me-2"></i>View all</a><span class="fs-ms text-muted">{{$category->products->count()}}</span></li>
		  </ul>
		</div>
	  </div>
	</div>
	@endforeach
	{!! $categories->links() !!}
  </div>
</div>

@endsection