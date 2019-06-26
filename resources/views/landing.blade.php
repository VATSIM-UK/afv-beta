<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<link rel="stylesheet" href="{{ mix('css/custom.css') }}">
	<!--<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="/css/custom.css">-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>AFV | Audio For VATSIM Beta</title>
</head>
<body class="bg-image font-sans">


<div class="flex flex-col justify-between min-h-screen">
    <div class="flex items-center h-full min-h-screen text-white sm:mb-4 lg:mb-0">
        <div class="mx-auto text-center pt-4">

            <div class="select-none">
                <img src="images/logo.png" class="h-32"/>
                <h1 class="text-5xl font-bold">Audio For VATSIM</h1>
            </div>

            @auth
                <div class="py-4">
                    @if(auth()->user()->pending)
                        <p><strong>{{ auth()->user()->name_first }}</strong>, thanks for expressing your interest in the beta!<br/>We'll be in touch soon.</p>
                    
					@elseif(auth()->user()->approved)
					
                    <div class="row col-14 justify-content-center">
					    <!-- Live MAP -->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mb-4 mx-2 text-right">
					    	<a href="https://afv-map.vatsim.net/" class="no-underline" target="_blank">
					    		<p class="btn btn-outline-light text-md w-100">Live Map</p>
					    	</a>
					    </div>
					    <!-- #END# LIVE MAP -->

                        <!-- PREFILE -->
					    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mb-4 mx-2 text-left">
					    	<a href="{{ route('prefile') }}" class="no-underline" target="_blank">
					    		<p class="btn btn-outline-light text-md w-100">Prefile</p>
					    	</a>
					    </div>
					    <!-- #END# PREFILE -->
					</div>

                    @if(auth()->user()->admin)
                    <div class="row col-14 justify-content-center">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mb-4 mx-2">
                            <a href="{{ route('admin') }}" class="no-underline">
					        	<p class="btn btn-outline-warning text-md w-100">ADMIN</p>
					        </a>
                        </div>
                    </div>
                    @endif

					<!-- NAV -->
					@include('approved_content.top_nav')
					<!-- #END# NAV -->
					
                    <div class="max-w-xl rounded-b overflow-hidden shadow-lg bg-grey-lighter opacity-90">
						<div class="px-6 py-4">
							<div class="tab-content" id="pills-tabContent">
								
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
									<!-- INTRO -->
									@include('approved_content.intro')
									<!-- #END# INTRO -->
								</div>
								
								<!-- PILOT CLIENTS -->
								<div class="tab-pane fade" id="pClients" role="tabpanel" aria-labelledby="pilots-tab">
									@include('approved_content.pilot_clients')
								
									<!-- vPilot -->
									@include('approved_content.vPilot')
									<!-- Other PClients -->
									@include('approved_content.pilot_clients_other')
								</div>	
								<!-- #END# Pilot Clients -->
								
								<!-- CONTROLLER Clients -->
								<div class="tab-pane fade" id="cClients" role="tabpanel" aria-labelledby="controllers-tab">
									<!-- General Info -->
									@include('approved_content.atc_clients')
									<br />
									<!-- Euroscope -->
									@include('approved_content.euroscope')
									<br />
									<!-- VRC, vStars, vERAM -->
									@include('approved_content.vrc_vStars_vERAM')
                                    <br />
									<!-- vATIS -->
									@include('approved_content.vATIS')
								</div>									
								<!-- #END# CONTROLLER Clients -->
	
								<!-- ISSUES -->
								<div class="tab-pane fade" id="issues" role="tabpanel" aria-labelledby="issues-tab">
								@include('approved_content.issues')
								</div>
								<!-- #END# ISSUES -->
								
							</div>
						</div>
                    </div>
                    @else
                        <p><strong>{{ auth()->user()->name_first }}</strong>, do you want the chance to try our new voice system?</p>
                    @endif
                </div>

                @if(!auth()->user()->has_request)
                    <div class="py-4">
                        <a class="no-underline" href="{{ route('request') }}">
                            <btn class="btn btn-blue text-white">Sign Me Up!</btn>
                        </a>
                    </div>
                @endif

                
                <div class="py-2 pb-4">
                    <a href="{{ route('auth.logout') }}" class="no-underline"><p class="btn btn-blue text-white text-sm">Logout</p>
                    </a>
                </div>
            @endauth

            @guest
                <div class="py-4">
                    <a class="no-underline" href="{{ route('auth.login') }}">
                        <btn class="btn btn-blue text-white">Login With VATSIM SSO</btn>
                    </a>
                </div>
            @endguest

        </div>
    </div>
	
	@guest
    <footer class="flex items-center bg-grey-light p-2 opacity-75 select-none fixed-bottom">
        <div class="flex-1">
            <p class="flex justify-center items-center tracking-wide">
                A <img src="images/logo.png" width="9%"> Network Site
			</p>
        </div>
    </footer>
	@endguest
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@if(session()->has("success"))
    <script language="javascript">
        Swal.fire({
            title: "{!! session('success')[0] !!}",
            html: "{!! session('success')[1] !!}",
            type: 'success'
        })
    </script>
@endif

@if(session()->has("error"))
    <script language="javascript">
        Swal.fire({
            title: 'Error!',
            html: "{!! session("error") !!}",
            type: 'error'
        })
    </script>
@endif

</body>
</html>
