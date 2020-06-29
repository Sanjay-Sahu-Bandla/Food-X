@extends('master')

<!-- title of the page -->

@section('title') Food-X @endsection('title')

@section('content')


<div class="main-section mt-0 pt-0">

	<div class="bg"></div>
</div>

<!-- Sign Up Error -->

@if($message = Session::get('sign_up_faild'))

@include('auth.login')

<div id="sign_up_faild" class="">fail</div>

@endif


<!-- Login Error -->

@if($message = Session::get('login_error'))

@include('auth.login')

@endif

<!-- Registration Modal -->

@if($message = Session::get('registrantion'))

@include('auth.login')

@endif

<div id="home-content" class="vh-100 d-flex justify-content-center align-items-center">
;
	<div class="heading text-center">
		<h3 class="text-white" id="title" style="font-style: italic;">You Buy, We Fly</h3>
		<h1 class="font-weight-normal text-white font-weight-bolder">Discover the delicious food in your area </h1><br>
		<a href="#food_section" class="d-none d-md-inline text-white shadow btn btn-primary btn-lg rounded-pill px-5" id="joinUs">Order Now !</a>
	</div>
</div>

<div id="food_section" class="row mr-0 pr-0 m-0 p-0">

	<div id="category_section" class="col-sm-4 float-left d-none d-md-block">
		<div class="list-group">
			<a href="#top_pics" class="list-group-item list-group-item-action flex-column align-items-start active">
				<div class=" d-flex w-100 justify-content-between row">
					<div class="col-4 d-flex justify-content-center align-items-center p-0 m-0">
						<img src="Images/Food/Chicken Korma.jpg" class="rounded-circle w-100">
					</div>
					<div class="col-8">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">Top Pics</h5>
							<small>2 days ago</small>
						</div>
						<p class="mb-1">All Veg & Non veg items are specially picked for you.</p>
						<!-- <small>27 options.</small> -->
					</div>
				</div>
			</a>
			<a href="#chinese" class="list-group-item list-group-item-action flex-column align-items-start">
				<div class=" d-flex w-100 justify-content-between row">
					<div class="col-4 d-flex justify-content-center align-items-center p-0 m-0">
						<img src="Images/Food/Veg Manchurian.jpg" class="rounded-circle w-100">
					</div>
					<div class="col-8">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">Chinese</h5>
						</div>
						<p class="mb-1">Taste the delicious chinese food made in nearest restaurents.</p>
						<!-- <small>27 options.</small> -->
					</div>
				</div>
			</a>
			<a href="#non_veg" class="list-group-item list-group-item-action flex-column align-items-start">
				<div class=" d-flex w-100 justify-content-between row">
					<div class="col-4 d-flex justify-content-center align-items-center p-0 m-0">
						<img src="Images/Food/Hyderabadi Biryani.jpg" class="rounded-circle w-100">
					</div>
					<div class="col-8">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">Non Vegetarian</h5>
						</div>
						<p class="mb-1">All Non veg items are specially picked for you.</p>
						<!-- <small>27 options.</small> -->
					</div>
				</div>
			</a>
			<a href="#veg" class="list-group-item list-group-item-action flex-column align-items-start">
				<div class=" d-flex w-100 justify-content-between row">
					<div class="col-4 d-flex justify-content-center align-items-center p-0 m-0">
						<img src="Images/Food/Aloo Paratha.jpg" class="rounded-circle w-100">
					</div>
					<div class="col-8">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">Vegetarian</h5>
						</div>
						<p class="mb-1">All Vegetarian items are specially picked for you.</p>
						<!-- <small>27 options.</small> -->
					</div>
				</div>
			</a>
			<a href="#Desserts" class="list-group-item list-group-item-action flex-column align-items-start">
				<div class=" d-flex w-100 justify-content-between row">
					<div class="col-4 d-flex justify-content-center align-items-center p-0 m-0">
						<img src="Images/Restaurants/Keventers - Milkshakes.jpg" class="rounded-circle w-100">
					</div>
					<div class="col-8">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">Desserts</h5>
						</div>
						<p class="mb-1">All Desserts items are specially picked for you.</p>
						<!-- <small>27 options.</small> -->
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-sm-8 mb-5 float-right" id="side_section">

		<h2 class="ml-3 font-weight-bold" id="top_pics">Top Pics</h2><br>

		<div class="card-columns m-0 p-0">

			@for($i=0; $i < count($restaurant); $i++)

			@if(($restaurant[$i]['ratings']) > 4 )



			<div class="card">

				<img class="card-img-top" src="Images/Restaurants/<?= str_replace('\'','',$restaurant[$i]['name'])

				?>.jpg" alt="Card image cap" style="width: 100%; height: 176px;">
				<div class="card-body">
					<h5 class="card-title mb-0">
					{{ $restaurant[$i]['name'] }}</h5>
					<p class="card-text mb-0">
					{{ $restaurant[$i]['category'] }}</p>
					<p class="mb-3 d-flex justify-content-between text-secondary">
						<span>
							<span class="badge badge-primary badge-pill pt-1 py-1 px-2"><i class="fa fa-star"></i> {{ json_encode($restaurant[$i]['ratings'],JSON_PRESERVE_ZERO_FRACTION) }}
							</span>
						</span>
						<span>
						{{ $restaurant[$i]['delivery_time'] }} Mins</span>
						<span>₹ {{ $restaurant[$i]['min_order'] }}</span>
					</p>
					
					<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
					<a href="restaurent/{{ $restaurant[$i]['id'] }}" class="btn btn-block btn-outline-primary">Quick View</a>
				</div>


			</div>

			@endif

			@endfor

		</div><br><br>

		<h2 class="ml-3 font-weight-bold" id="chinese">Chinese</h2><br>

		<div class="card-columns m-0 p-0">

			@for($i=0; $i < 5; $i++)

			<div class="card">

				<img class="card-img-top" src="Images/Restaurants/<?= str_replace('\'','',$restaurant[$i]['name'])

				?>.jpg" alt="Card image cap" style="width: 100%; height: 176px;">
				<div class="card-body">
					<h5 class="card-title mb-0">
					{{ $restaurant[$i]['name'] }}</h5>
					<p class="card-text mb-0">
					{{ $restaurant[$i]['category'] }}</p>
					<p class="mb-3 d-flex justify-content-between text-secondary">
						<span>
							<span class="badge badge-primary badge-pill pt-1 py-1 px-2"><i class="fa fa-star"></i> {{ json_encode($restaurant[$i]['ratings'],JSON_PRESERVE_ZERO_FRACTION) }}
							</span>
						</span>
						<span>
						{{ $restaurant[$i]['delivery_time'] }} Mins</span>
						<span>₹ {{ $restaurant[$i]['min_order'] }}</span>
					</p>
					
					<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
					<a href="restaurent/{{ $restaurant[$i]['id'] }}" class="btn btn-block btn-outline-primary">Quick View</a>
				</div>


			</div>

			@endfor

		</div><br><br>

		<h2 class="ml-3 font-weight-bold" id="non_veg">Non Vegetarian</h2><br>

		
		<div class="card-columns m-0 p-0">

			@for($i=5; $i < 10; $i++)

			<div class="card">

				<img class="card-img-top" src="Images/Restaurants/{{ str_replace('\'','',$restaurant[$i]['name'])

			}}.jpg" alt="Card image cap" style="width: 100%; height: 176px;">
			<div class="card-body">
				<h5 class="card-title mb-0">
				{{ $restaurant[$i]['name'] }}</h5>
				<p class="card-text mb-0">
				{{ $restaurant[$i]['category'] }}</p>
				<p class="mb-3 d-flex justify-content-between text-secondary">
					<span>
						<span class="badge badge-primary badge-pill pt-1 py-1 px-2"><i class="fa fa-star"></i> {{ json_encode($restaurant[$i]['ratings'],JSON_PRESERVE_ZERO_FRACTION) }}
						</span>
					</span>
					<span>
					{{ $restaurant[$i]['delivery_time'] }} Mins</span>
					<span>₹ {{ $restaurant[$i]['min_order'] }}</span>
				</p>

				<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
				<a href="restaurent/{{ $restaurant[$i]['id'] }}" class="btn btn-block btn-outline-primary">Quick View</a>
			</div>


		</div>

		@endfor

	</div><br><br>

	<h2 class="ml-3 font-weight-bold" id="veg">Vegetarian</h2><br>

	<div class="card-columns m-0 p-0">

		@for($i=10; $i < 15; $i++)

		<div class="card">

			<img class="card-img-top" src="Images/Restaurants/<?= str_replace('\'','',$restaurant[$i]['name'])

			?>.jpg" alt="Card image cap" style="width: 100%; height: 176px;">
			<div class="card-body">
				<h5 class="card-title mb-0">
				{{ $restaurant[$i]['name'] }}</h5>
				<p class="card-text mb-0">
				{{ $restaurant[$i]['category'] }}</p>
				<p class="mb-3 d-flex justify-content-between text-secondary">
					<span>
						<span class="badge badge-primary badge-pill pt-1 py-1 px-2"><i class="fa fa-star"></i> {{ json_encode($restaurant[$i]['ratings'],JSON_PRESERVE_ZERO_FRACTION) }}
						</span>
					</span>
					<span>
					{{ $restaurant[$i]['delivery_time'] }} Mins</span>
					<span>₹ {{ $restaurant[$i]['min_order'] }}</span>
				</p>

				<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
				<a href="restaurent/{{ $restaurant[$i]['id'] }}" class="btn btn-block btn-outline-primary">Quick View</a>
			</div>


		</div>

		@endfor

	</div><br><br>

	<h2 class="ml-3 font-weight-bold" id="Desserts">Desserts</h2><br>

	<div class="card-columns m-0 p-0">

		@for($i=15; $i < 18; $i++)

		<div class="card">

			<img class="card-img-top" src="Images/Restaurants/<?= str_replace('\'','',$restaurant[$i]['name'])

			?>.jpg" alt="Card image cap" style="width: 100%; height: 176px;">
			<div class="card-body">
				<h5 class="card-title mb-0">
				{{ $restaurant[$i]['name'] }}</h5>
				<p class="card-text mb-0">
				{{ $restaurant[$i]['category'] }}</p>
				<p class="mb-3 d-flex justify-content-between text-secondary">
					<span>
						<span class="badge badge-primary badge-pill pt-1 py-1 px-2"><i class="fa fa-star"></i> {{ json_encode($restaurant[$i]['ratings'],JSON_PRESERVE_ZERO_FRACTION) }}
						</span>
					</span>
					<span>
					{{ $restaurant[$i]['delivery_time'] }} Mins</span>
					<span>₹ {{ $restaurant[$i]['min_order'] }}</span>
				</p>

				<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
				<a href="restaurent/{{ $restaurant[$i]['id'] }}" class="btn btn-block btn-outline-primary">Quick View</a>
			</div>


		</div>

		@endfor

	</div><br><br>

</div>


</div>





<script type="text/javascript">

	$(document).ready(function() {

		$value = $('#sign_up_faild').text();

		// alert($('#sign_up_faild').text());

		if($value == 'fail') {

		$('#login').modal('hide');
		$('#register').modal('show');
		}
	});
	
</script>

@endsection('content')