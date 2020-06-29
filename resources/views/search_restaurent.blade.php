@extends('master')

@section('title') Search Restaurent @endsection('title')


@section('content')

<div id="main_page" class="m-md-5 m-2 pb-5">

	<div id="search_field" class="m-md-5 m-2">
		<input id="search_restaurant" type="search" name="search" class="form-control form-control-lg w-100" placeholder="Search the nearest restaurents in your area ...">
	</div>

	<div id="restaurents" class="m-md-5 m-2">
		<div class="row m-md-5 m-md-2 m-0">

			@for($i=0; $i < count($restaurant); $i++)

			<div id="box" class="px-md-4 my-2 col-md-6 p-0">
				<a href="/restaurent/{{ $restaurant[$i]['id'] }}" class="border py-2 p-0 d-flex justify-content-between rounded text-decoration-none link-unstyled">
					<div class="col-5 d-flex justify-content-center align-items-center">
						<img class="w-100 card-img-left rounded" src="/Images/Restaurants/<?= str_replace('\'','',$restaurant[$i]['name'])

						?>.jpg" alt="Card image cap" style="height: 100px;">
					</div>
					<div class="col-7">
						<h5 class="card-title mb-md-2 mb-0 text-dark">{{ $restaurant[$i]['name'] }}</h5>
						<p class="card-text mb-md-2 mb-0 text-muted">{{ $restaurant[$i]['category'] }}</p>
						<p class="mb-md-3 mb-0 d-flex justify-content-between text-secondary">
							<span>
								<span class="badge badge-primary badge-pill pt-1 py-1 px-2"><i class="fa fa-star"></i> {{ json_encode($restaurant[$i]['ratings'],JSON_PRESERVE_ZERO_FRACTION) }}
								</span>
							</span>
							<span>{{ $restaurant[$i]['delivery_time'] }} Mins</span>
							<span class="d-md-inline d-none">₹ {{ $restaurant[$i]['min_order'] }}</span>
						</p>
					</div>
				</a>
			</div>

			@endfor

		</div>

	</div>
</div>

<script type="text/javascript">

	$(document).ready(function() {

		$("#search_restaurant").on('keyup', function(){

			var value = $(this).val().toLowerCase();

			$("#restaurents div div h5").each(function () {

				if ($(this).text().toLowerCase().search(value) > -1) {
					$(this).parent().closest('#box').show();
				} else {
					$(this).parent().closest('#box').hide();
				}
			});   
		});
	});

</script>

@endsection('content')