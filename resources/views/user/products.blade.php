@extends('user.layout')

@section('content')
	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="#">Home</a></li>
						<li class="active">Headphones ({{ $products->total() }})</li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Categories</h3>
						<div class="checkbox-filter">

							<div class="input-checkbox">
								<input type="checkbox" id="category-1">
								<label for="category-1">
									<span></span>
									Headphones
									<small>({{ $products->total() }})</small>
								</label>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->
				</div>
				<!-- /ASIDE -->
			<!-- STORE -->
			<div id="store" class="col-md-9">

				<!-- store products -->
				<div class="row">

					@foreach ($products as $product)
						<!-- product -->
						<div class="col-md-4 col-xs-6">
							<div class="product">
								<div class="product-img">
									<img src="./img/product01.png" alt="">
									<div class="product-label">
										<span class="new">NEW</span>
									</div>
								</div>
								<div class="product-body">
									<h3 class="product-name"><a href="#">{{$product->product_name}}</a></h3>
									<h4 class="product-price">$ {{ $product->price}}</h4>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-btns">
										<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
									</div>
								</div>
								
								@if ( Cart::get($product->id) == null)
									<div class="add-to-cart">
										<a href="{{ url('add-to-cart/'.$product->id) }}">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</a>
									</div>
								@endif
								
							</div>
						</div>
						<!-- /product -->	
						<div class="clearfix visible-sm visible-xs"></div>
					@endforeach
				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<span class="store-qty">Showing {{$products->count()}} products</span>
					
					{{ $products->links('user.layouts.pagination', [ 'paginator' => $products ])}}

				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection