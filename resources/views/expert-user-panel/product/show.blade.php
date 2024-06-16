@extends('expert-user-panel.layout.index')
@section('title')
{{$product->name}}
@endsection

@section('content')

<div class="row clearfix">
	<div class="col-lg-12">
		<div class="card">
			<div class="body">
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-md-12">
						<div class="preview preview-pic tab-content">
							@foreach($product->images as $key => $image)
							<div class="tab-pane @if($key == 0) active @endif" id="product_{{$key}}"><img src="{{asset($image->image)}}" class="img-fluid" alt="" /></div>
							@endforeach\
						</div>
						<ul class="preview thumbnail nav nav-tabs">
							@foreach($product->images as $index => $product_image)
							<li class="nav-item"><a class="nav-link @if($index == 0) active @endif" data-toggle="tab" href="#product_{{$index}}">
								<img src="{{asset($product_image->image)}}" alt=""/></a>
							</li>
							@endforeach
						</ul>                
					</div>
					<div class="col-xl-9 col-lg-8 col-md-12">
						<div class="product details">
							<h3 class="product-title mb-0">{{$product->name}}</h3>
							<h5 class="price mt-0">Current Price: <span class="col-amber">PKR {{$product->price}}</span></h5>
							<hr>
							<p class="product-description">{!! @$product->description !!}</p>
							<p class="vote"><strong>Category :</strong> {{@$product->category->name}}</p>
							<p class="vote"><strong>Brand :</strong> {{@$product->brand->name}}</p>
							<p class="vote"><strong>Phone :</strong> {{@$product->phone}}</p>
							<div class="action">
								<a href="{{route('user.product.order',$product->id)}}" class="btn btn-primary waves-effect" >PURCHASE NOW</a> 
								{{-- <button class="btn btn-info waves-effect" type="button"><i class="zmdi zmdi-favorite"></i></button> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection