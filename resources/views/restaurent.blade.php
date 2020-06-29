@extends('master')

@section('title') Restaurent @endsection('title')


@section('content')

<?php

$img = str_replace("'","",$restaurant['name']);

?>


<div id="restaurant_poster" class="m-0 p-0" style="background: url('/Images/Restaurants/{{ $img }}.jpg'); height: 300px; background-size: cover; object-fit: cover;">
	<div id="layer"></div>
	<div class="restaurant_poster d-flex justify-content-between container m-0 py-5 pl-md-5 mt-md-5">
		<div id="restaurant_details">
			<h2 id="title" class="text-white font-weight-bold">{{ $restaurant['name'] }}
				<span id="restaurant_id" class="d-none">{{ $restaurant['id'] }}</span></h2>
			<p id="category" class="text-muted font-weight-bold">{{ $restaurant['category'] }}</p>
			<p id="address" class="text-muted font-weight-bold">JN Road, Abids &amp; Koti</p>
			<p class="d-flex justify-content-between text-secondary" style="width: 280px !important;">
				<span>
					<span class="badge badge-primary badge-pill pt-1 py-1 px-2"><i class="fa fa-star"></i> {{ $restaurant['ratings'] }}
					</span>
				</span>
				<span class="text-white font-weight-bold">{{ $restaurant['delivery_time'] }} Mins</span>
				<span class="text-white font-weight-bold">₹ {{ $restaurant['min_order'] }} Min</span>
			</p>
		</div>
	</div>
</div>

<a id="cart_holder" href="/cart" class="shadow"><i class="fa fa-shopping-cart"></i>
</a>

<div class="row mx-md-5 m-0 d-flex justify-content-center my-2">
	<div class="col-4 d-none d-md-block m-0 p-0">
		<div class="list-group">
			<a href="#Recommended" class="list-group-item list-group-item-action active">
				Recommended
			</a>
			<a href="#Chinese" class="list-group-item list-group-item-action">Chinese</a>
			<a href="#Veg" class="list-group-item list-group-item-action">Veg</a>
			<a href="#Non_veg" class="list-group-item list-group-item-action">Non veg</a>
			<a href="#Dessert" class="list-group-item list-group-item-action">Dessert</a>
		</div>
	</div>

	<div class="col-8 px-md-5 px-0 d-flex justify-content-center">

		<div class="category_section mx-md-3" style="margin-left: -35px;
		margin-right: -35px;">


		<h2 class="font-weight-bold" id="Recommended">Recommended</h2><br>

		<div class="row d-flex justify-content-center mb-5">


			@for($i=0; $i < 5; $i++)

			<div class="col-sm-6 p-lg-4 py-2">
				<div class="row border py-2 d-flex justify-content-between rounded">
					<div class="col-5 d-flex justify-content-center align-items-center">
						<img class="w-100 card-img-left rounded" src="/Images/Food/{{ $food_data[$i]['name'] }}.jpg" alt="Card image cap" style="height: 100px;">
					</div>
					<div class="col-7">
						<h5 class="card-title mb-0">

							{{ $food_data[$i]['name'] }}

						</h5>
						<p class="card-text mb-0">{{ $food_data[$i]['category'] }}</p>
						<p class="mb-3 d-flex justify-content-between text-secondary">
							<span class="badge badge-primary badge-pill d-flex align-items-center px-2"><i class="fa fa-star mr-1"></i> 
								{{ json_encode($food_data[$i]['ratings'],JSON_PRESERVE_ZERO_FRACTION) }}
							</span>
							<span>₹ {{ $food_data[$i]['price'] }}</span>
						</p>
						<div class="btn-group" role="group" aria-label="Quantity">
							<button type="button" class="btn btn-outline-success plus">+</button>
							<button type="button" class="btn btn-outline-success quantity" value="0" id="{{ $food_data[$i]['id'] }}">Add</button><button type="button" class="btn btn-outline-success minus">-</button>
						</div>
					</div>
				</div>
			</div>

			@endfor

		</div><hr>


		<h2 class="font-weight-bold" id="Chinese">Chinese</h2><br>

		<div class="row d-flex justify-content-center mb-5">


			@for($i=5; $i < 10; $i++)

			<div class="col-sm-6 p-lg-4 py-2">
				<div class="row border py-2 d-flex justify-content-between rounded">
					<div class="col-5 d-flex justify-content-center align-items-center">
						<img class="w-100 card-img-left rounded" src="/Images/Food/{{ $food_data[$i]['name'] }}.jpg" alt="Card image cap" style="height: 100px;">
					</div>
					<div class="col-7">
						<h5 class="card-title mb-0">

							{{ $food_data[$i]['name'] }}

						</h5>
						<p class="card-text mb-0">{{ $food_data[$i]['category'] }}</p>
						<p class="mb-3 d-flex justify-content-between text-secondary">
							<span class="badge badge-primary badge-pill d-flex align-items-center px-2"><i class="fa fa-star mr-1"></i> 
								{{ json_encode($food_data[$i]['ratings'],JSON_PRESERVE_ZERO_FRACTION) }}
							</span>
							<span>₹ {{ $food_data[$i]['price'] }}</span>
						</p>
						<div class="btn-group" role="group" aria-label="Quantity">
							<button type="button" class="btn btn-outline-success plus">+</button>
							<button type="button" class="btn btn-outline-success quantity" value="0" id="{{ $food_data[$i]['id'] }}">Add</button><button type="button" class="btn btn-outline-success minus">-</button>
						</div>
					</div>
				</div>
			</div>

			@endfor

		</div><hr>

		<h2 class="font-weight-bold" id="Veg">Veg</h2><br>

		<div class="row d-flex justify-content-center mb-5">


			@for($i=10; $i < 15; $i++)

			<div class="col-sm-6 p-lg-4 py-2">
				<div class="row border py-2 d-flex justify-content-between rounded">
					<div class="col-5 d-flex justify-content-center align-items-center">
						<img class="w-100 card-img-left rounded" src="/Images/Food/{{ $food_data[$i]['name'] }}.jpg" alt="Card image cap" style="height: 100px;">
					</div>
					<div class="col-7">
						<h5 class="card-title mb-0">

							{{ $food_data[$i]['name'] }}

						</h5>
						<p class="card-text mb-0">{{ $food_data[$i]['category'] }}</p>
						<p class="mb-3 d-flex justify-content-between text-secondary">
							<span class="badge badge-primary badge-pill d-flex align-items-center px-2"><i class="fa fa-star mr-1"></i> 
								{{ json_encode($food_data[$i]['ratings'],JSON_PRESERVE_ZERO_FRACTION) }}
							</span>
							<span>₹ {{ $food_data[$i]['price'] }}</span>
						</p>
						<div class="btn-group" role="group" aria-label="Quantity">
							<button type="button" class="btn btn-outline-success plus">+</button>
							<button type="button" class="btn btn-outline-success quantity" value="0" id="{{ $food_data[$i]['id'] }}">Add</button><button type="button" class="btn btn-outline-success minus">-</button>
						</div>
					</div>
				</div>
			</div>

			@endfor

		</div><hr>


		<h2 class="font-weight-bold" id="Non_veg">Non veg</h2><br>

		<div class="row d-flex justify-content-center mb-5">


			@for($i=15; $i < 20; $i++)

			<div class="col-sm-6 p-lg-4 py-2">
				<div class="row border py-2 d-flex justify-content-between rounded">
					<div class="col-5 d-flex justify-content-center align-items-center">
						<img class="w-100 card-img-left rounded" src="/Images/Food/{{ $food_data[$i]['name'] }}.jpg" alt="Card image cap" style="height: 100px;">
					</div>
					<div class="col-7">
						<h5 class="card-title mb-0">

							{{ $food_data[$i]['name'] }}

						</h5>
						<p class="card-text mb-0">{{ $food_data[$i]['category'] }}</p>
						<p class="mb-3 d-flex justify-content-between text-secondary">
							<span class="badge badge-primary badge-pill d-flex align-items-center px-2"><i class="fa fa-star mr-1"></i> 
								{{ json_encode($food_data[$i]['ratings'],JSON_PRESERVE_ZERO_FRACTION) }}
							</span>
							<span>₹ {{ $food_data[$i]['price'] }}</span>
						</p>
						<div class="btn-group" role="group" aria-label="Quantity">
							<button type="button" class="btn btn-outline-success plus">+</button>
							<button type="button" class="btn btn-outline-success quantity" value="0" id="{{ $food_data[$i]['id'] }}">Add</button><button type="button" class="btn btn-outline-success minus">-</button>
						</div>
					</div>
				</div>
			</div>

			@endfor

		</div><hr>


		<h2 class="font-weight-bold" id="Dessert">Dessert</h2><br>

		<div class="row d-flex justify-content-center mb-5">

			@for($i=20; $i < 22; $i++)

			<div class="col-sm-6 p-lg-4 py-2">
				<div class="row border py-2 d-flex justify-content-between rounded">
					<div class="col-5 d-flex justify-content-center align-items-center">
						<img class="w-100 card-img-left rounded" src="/Images/Food/{{ $food_data[$i]['name'] }}.jpg" alt="Card image cap" style="height: 100px;">
					</div>
					<div class="col-7">
						<h5 class="card-title mb-0">

							{{ $food_data[$i]['name'] }}

						</h5>
						<p class="card-text mb-0">{{ $food_data[$i]['category'] }}</p>
						<p class="mb-3 d-flex justify-content-between text-secondary">
							<span class="badge badge-primary badge-pill d-flex align-items-center px-2"><i class="fa fa-star mr-1"></i> 
								{{ json_encode($food_data[$i]['ratings'],JSON_PRESERVE_ZERO_FRACTION) }}
							</span>
							<span>₹ {{ $food_data[$i]['price'] }}</span>
						</p>
						<div class="btn-group" role="group" aria-label="Quantity">
							<button type="button" class="btn btn-outline-success plus">+</button>
							<button type="button" class="btn btn-outline-success quantity" value="0" id="{{ $food_data[$i]['id'] }}">Add</button><button type="button" class="btn btn-outline-success minus">-</button>
						</div>
					</div>
				</div>
			</div>

			@endfor

		</div><hr>

	</div>


</div>
</div>

@endsection('content')