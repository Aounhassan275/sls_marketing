@extends('expert-user-panel.layout.index')
@section('title')
Products
@endsection

@section('content')

<div class="row clearfix">
	@foreach($products as $product)
	<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
		<div class="card">
			<div class="body product_item">
				<img src="{{asset(@$product->images->first()->image)}}" alt="Product" class="img-fluid cp_img" />
				<div class="product_details">
					<a href="{{route('user.product.show',str_replace(' ', '_',$product->name))}}">{{@$product->name}}</a>
					<ul class="product_price list-unstyled">
						{{-- <li class="old_price">$16.00</li> --}}
						<li class="new_price">PKR {{$product->price}}</li>
					</ul>                                
				</div>
				<div class="action">
					<a href="{{route('user.product.show',str_replace(' ', '_',$product->name))}}" class="btn btn-info waves-effect"><i class="zmdi zmdi-eye"></i></a>
					<a href="{{route('user.product.order',$product->id)}}" class="btn btn-primary waves-effect">Purchase Now</a>
				</div>
			</div>
		</div>                
	</div>
	@endforeach
</div>
<div class="row clearfix">
	<div class="col-sm-12">
		{{$products->links()}}
	</div>
</div>
@endsection