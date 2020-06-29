@extends('master')

@section('title') Profile @endsection('title')


@section('content')

@if($message = Session::get('update'))

	{{ $message }}

@endif

<div id="profile_section" class="mx-0 px-0 pb-5" style="height: 100%; background: #d3d3d345;">

	<div class="p-md-5 p-2 mb-5">
		
		<div id="profile_poster" class="m-0 p-0 rounded shadow" style="background: linear-gradient(45deg, #2196F3, #053d5624); height: 200px; position: relative;">
			<a href="{{ $user->id }}/edit" class="rounded-circle d-flex justify-content-center align-items-center shadow position-absolute" style="top: 15px; right: 15px; padding: 6px 6px 9px 9px;"><i class="fa fa-edit"></i></a>
			<div class="restaurant_poster d-flex justify-content-around my-0 pt-5 pb-md-3 pb-1" style="position: absolute;bottom: 20px;">
				<div id="profile_img" class="col-md-5 col-4 mt-md-0 mt-4">
					<img src="/Images/profile.png" class="rounded-circle w-100 border shadow">
				</div>
				<div id="restaurant_details" class="col-md-7 col-8 position-relative">
					<div style="position: absolute; bottom: 0;">
						<h4 id="title" class="text-white font-weight-bold">{{ $user->name }}</h4>
						<p id="category" class="text-white"><i class="fas fa-map-marker-alt"></i> {{ $user->location }}</p>
					</div>
				</div>
			</div>
		</div>

		<div id="other_details" class="mt-4 m-0 p-0">

			<div id="accordion" class="mx-md-5 mt-md-5 px-md-5">

				<div class="card mb-1">
					<div class="card-header p-1" id="headingTwo">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseNotify" aria-expanded="false" aria-controls="collapseTwo">
								<i class="far fa-bell mr-1"></i> <span class="text-dark">Notifications</span>
							</button>
						</h5>
					</div>
					<div id="collapseNotify" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">
							No new notifications !
						</div>
					</div>
				</div>

				<div class="card mb-1">
					<div class="card-header p-1" id="headingTwo">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseHistory" aria-expanded="false" aria-controls="collapseTwo">
								<i class="fa fa-history mr-1"></i> <span class="text-dark">Order History</span>
							</button>
						</h5>
					</div>
					<div id="collapseHistory" class="

					@if(Session::get('order') == 'success')

					@else

					collapse

					@endif

					" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body row">

							@if(!isset($restaurant[0]))

							<span class="ml-3">No new orders !</span>

							@endif

							@for($i=0; $i < count($food_name); $i++)

							@for($j=0; $j < count($food_name[$i]); $j++)

							<div class="p-2 col-md-6 mb-2">
								<div class="card p-2 bg-light">
									<h5 class="card-title mb-md-2 mb-0">{{ $food_name[$i][$j] }}</h5>
									<p class="card-text mb-md-2 mb-0 text-muted">{{ $restaurant[$i] }}</p>
									<p class="mb-md-3 mb-0 d-flex justify-content-between text-secondary">

										<span class="text-muted">
											{{ $timestamp[$i] }}
										</span>
										<span class="badge badge-primary badge-pill py-1 px-2 d-flex justify-content-center align-items-center"> ₹ {{ $food_price[$i][$j] }}

											({{ $food_quantities[$i][$j] }})
										</span>

									</p>
								</div>
							</div>

							
							@endfor

							@endfor

						</div>
					</div>
				</div>

				<div class="card mb-1">
					<div class="card-header p-1" id="headingThree">
						<h5 class="mb-0">
							<a href="mailto:sanjaysahubandla@gmail.com?subject=Help Needed ! " class="btn btn-link collapsed w-100 text-left">
								<i class="far fa-question-circle  mr-1"></i> <span class="text-dark">Help</span>
							</a>
						</h5>
					</div>
					<!-- <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						<div class="card-body">

							Help
						</div>
					</div> -->
				</div>

				<div class="card mb-1">
					<div class="card-header p-1" id="headingTwo">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
								<i class="fas fa-share mr-1"></i><span class="text-dark"> Share on socila media</span>
							</button>
						</h5>
					</div>
					<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">
							<ul class="social-icons">
								<li><a class="whatsapp" href="whatsapp://send?text=https://github.com/Sanjay-Sahu-Bandla" title="Latest Projects of Sanjay Sahu Bandla" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
								<li><a href="https://www.facebook.com/profile.php?id=100010035810827" class="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/SanjaySahu14312" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
								<li><a class="dribbble" href="https://www.instagram.com/sanjay_sahu_bandla" target="_blank"><i class="fab fa-instagram"></i></a></li>
								<li><a class="linkedin" href="https://www.linkedin.com/in/sanjay-sahu-395b2a147/" target="_blank"><i class="fab fa-linkedin"></i></a></li>   
							</ul>
						</div>
					</div>
				</div>
				<div class="card mb-1">
					<div class="card-header p-1" id="headingThree">
						<h5 class="mb-0">
							<a href="#" class="btn btn-link w-100 text-left"onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
								<i class="fas fa-sign-out-alt mr-1"></i> <span class="text-dark">

									Log Out 

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

								</span>
							</a>
						</h5>
					</div>
				</div>
			</div>

		</div>

	</div>
	
</div>

<script type="text/javascript">

	$(document).ready(function() {

		$('#logout-form').on('submit',function() {

			if(confirm('Are you sure want to login')) {
				return true
			}
			else {
				return false;
			}
		});
	});

</script>

@endsection('content')