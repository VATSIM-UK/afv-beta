<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<link rel="stylesheet" href="{{ mix('css/custom.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>VATSIM AFV Beta</title>
</head>
<body class="bg-image font-sans">

@auth
@if(auth()->user()->approved)
<div class="flex flex-col justify-between h-full">
@else
<div class="flex flex-col justify-between h-screen">
@endif
@endauth

@guest
<div class="flex flex-col justify-between h-screen">
@endguest
    <div class="flex items-center h-full text-white sm:mb-4 lg:mb-0">
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
					
					<!-- Live MAP -->
					<div class="pb-4">
						<a href="https://afv-map.vatsim.net/" class="no-underline">
							<p class="btn btn-outline-light text-md">View Live Map</p>
						</a>
					</div>
					<!-- #END# LIVE MAP -->
					
					<!-- NAV -->
					@include('approved_content.top_nav')
					<!-- #END# NAV -->
                    <div class="max-w-xl rounded-b overflow-hidden shadow-lg bg-grey-lighter opacity-90">
						<div class="px-6 py-4">
                            <!-- INTRO -->
                            @include('approved_content.intro')
							<!-- #END# INTRO -->

							
							<br />
                            <hr/>
                            <br />
							

                            <!-- PILOT CLIENTS -->
                            @include('approved_content.pilot_clients')
                            <br />
                            <!-- vPilot -->
                            @include('approved_content.vPilot')
                            <!-- Other PClients -->
							@include('approved_content.pilot_clients_other')
                            <!-- #END# Pilot Clients -->


                            <br/>
                            <hr/>
                            <br/>

							
                            <!-- CONTROLLER Clients -->
                            <!-- General Info -->
                            @include('approved_content.atc_clients')
                            <br />
                            <!-- Euroscope -->
                            @include('approved_content.euroscope')
                            <br />
                            <!-- VRC, vStars, vERAM -->
                            @include('approved_content.vrc_vStars_vERAM')
                            <!-- #END# CONTROLLER Clients -->


                            <br/>
                            <hr/>
                            <br/>
							

                            <!-- SUPS -->
                            @include('approved_content.sups')
							

                            <br/>
                            <hr/>
                            <br/>
							

                            <!-- ATIS -->
                            @include('approved_content.atis')

							
                            <br/>
                            <hr/>
                            <br/>
							

                            <!-- ISSUES -->
							@include('approved_content.issues')
							
							<br />
							<hr />
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
    <footer class="flex items-center bg-grey-light p-2 opacity-75 select-none">
        <div class="flex-1">
            <p class="flex justify-center items-center tracking-wide">
                A <img src="images/logo.png" width="9%"> Network Site
			</p>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

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
