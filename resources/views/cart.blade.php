@extends('master')

<!-- title of the page -->

@section('title') Cart @endsection('title')

@section('content')


@if($user == 'Invalid')

@include('auth.login')

<div id="user" class="d-none">Invalid</div>

@endif


@if (Cookie::get('restaurant') !== null)

<div class="row container m-md-5 mt-3 mb-5 m-0 p-md-0 pb-4 d-flex" id="payment">
	<div class="col-md-4 order-md-2 mb-5">
		<h4 class="d-flex justify-content-between align-items-center mb-3">
			<span class="text-muted">Your cart</span>
			<span class="badge badge-secondary badge-pill">

				1
			</span>
		</h4>
		<ul class="list-group mb-3">

			<span id="Cid" class="d-none">4</span><span id="Ccat" class="d-none">Executive Meal Box (veg)</span>
			

			@for($i=0; $i < count($food_name); $i++)

			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<h6 class="my-0">{{ $food_name[$i] }}</h6>
					<small class="text-muted">{{ $restaurant }}</small>
				</div>
				<div>
					<div class="text-muted"><span class="mr-1">₹</span>

						{{ $food_price[$i] }}

						({{	$food_quantities[$i] }})

					</div>
					<!-- <small class="text-muted">Total</small> -->
				</div>
			</li>

			@endfor

			<li class="list-group-item d-flex justify-content-between">
				<span>Total (INR)</span>
				<strong><span class="mr-1">₹</span>

					{{ $total }}

				</strong>
			</li>
		</ul>

		<div class="card p-2">
			<div class="input-group">
				<input id="promoCode" type="text" class="form-control" placeholder="Promo code">
				<div class="input-group-append" required="">
					<button type="button" class="btn btn-white text-white" style="background: #17a2b8;">Redeem</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8 order-md-1">
		<h4 class="mb-3 text-muted">Billing address</h4>
		<form class="needs-validation" id="order_form" method="post" action="">
			{{ @csrf_field() }}
			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="firstName">Reciever Name</label>
					<input type="text" class="form-control" id="firstName" placeholder="" value="" required="" name="name">
					<div class="invalid-feedback">
						Valid first name is required.
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="username">Phone</label><small class="ml-2 text-muted">(with country code)</small>
					<input type="number" class="form-control" id="username" placeholder="+91 99080 86610" required="" name="phone">
					<div class="invalid-feedback" style="width: 100%;">
						Your number is required.
					</div>
				</div>
			</div>

			<div class="mb-3">
				<label for="address">Address</label>
				<input type="text" class="form-control" id="address" placeholder="1234 Main St" required="" name="address">
				<div class="invalid-feedback">
					Please enter your shipping address.
				</div>
			</div>

			<hr class="mb-4">
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="same-address">
				<label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="save-info">
				<label class="custom-control-label" for="save-info">Save this information for next time</label>
			</div>
			<hr class="mb-4">

			<h4 class="mb-3">Payment</h4>

			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="cc-name">Name on card</label>
					<input type="text" class="form-control" id="cc-name" placeholder="" required="" name="name_on_card">
					<small class="text-muted">Full name as displayed on card</small>
					<div class="invalid-feedback">
						Name on card is required
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="cc-number">Debit card number</label>
					<input type="number" class="form-control" id="cc-number" placeholder="" required="" name="debit_card_no">
					<div class="invalid-feedback">
						Credit card number is required
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 mb-3">
					<label for="cc-expiration">Expiration</label>
					<input type="text" class="form-control" id="cc-expiration" placeholder="" required="" name="expire">
					<div class="invalid-feedback">
						Expiration date required
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<label for="cc-expiration">CVV</label>
					<input type="number" class="form-control" id="cc-cvv" placeholder="" required="" name="cvv">
					<div class="invalid-feedback">
						Security code required
					</div>
				</div>
			</div>
			<hr class="mb-4">
			<button class="btn btn-white btn-lg btn-block text-white" type="submit" style="background: #17a2b8;">Place Order</button><br>
		</form>

		<form method="post" action="{{ action('cart_controller@destroy',$restaurant) }}">

			<div class="text-center">

				{{ csrf_field() }}

				<input type="hidden" name="_method" value="DELETE">

				<button id="clear_cart" type="submit" class="btn btn-outline-secondary btn-sm">Clear cart and order again</button>

			</div>

		</form>
	</div>
</div>


@else

<div class="d-flex justify-content-center align-items-center container" style="height: 100vh;">

	<div>
		<div class="text-muted text-center">The cart is empty !</div><br>
		<a href="/home" class="text-center">Click here to order anything</a>
	</div>	

</div>

@endif



<script type="text/javascript">
	$(document).ready(function() {

		$('#order_form').on('submit', function() {

			if(($('#user').text() == 'Invalid')) {
				$('#login').modal('show');
			}
			else {
				return true;
			}
		})
	})
</script>

@endsection('content')