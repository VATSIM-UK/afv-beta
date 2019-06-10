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
        <div class="col-12 mx-auto text-center pt-4">

            <div class="select-none">
                <img src="images/logo.png" class="h-32"/>
                <h1 class="text-5xl font-bold">Audio For VATSIM</h1>
            </div>

            @auth
                <div class="py-4">					
                    <div class="row col-14 justify-content-center">
					    <!-- Live MAP -->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mb-4 mx-2 text-right">
					    	<a href="https://afv-map.vatsim.net/" class="no-underline">
					    		<p class="btn btn-outline-light text-md w-100">Live Map</p>
					    	</a>
					    </div>
					    <!-- #END# LIVE MAP -->

                        <!-- PREFILE -->
					    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mb-4 mx-2 text-left">
					    	<a href="{{ route('prefile') }}" class="no-underline">
					    		<p class="btn btn-outline-light text-md w-100">Prefile</p>
					    	</a>
					    </div>
					    <!-- #END# PREFILE -->
					</div>

                    <div class="row col-14 justify-content-center">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mb-4 mx-2">
                            <a href="{{ route('landing') }}" class="no-underline">
					        	<p class="btn btn-outline-warning text-md w-100">Back</p>
					        </a>
                        </div>
                    </div>

					<!-- NAV TOP -->
                    <ul class="bg-blue nav nav-pills nav-justified rounded text-left select-none mb-0" id="pills-tab" role="tablist">
                      <li class="nav-item border-left">
                    	<a class="nav-link text-white h-100 {{ (!session()->has('approve')) ? 'active' : '' }}" id="approved-tab" data-toggle="pill" href="#approved" role="tab" aria-controls="approved" aria-selected="false">
                            APPROVED ({{ count($approvals['approved']) }})
                        </a>
                      </li>
                      <li class="nav-item border-left">
                    	<a class="nav-link text-white h-100 {{ (session()->has('approve')) ? 'active' : '' }}" id="pending-tab" data-toggle="pill" href="#pending" role="tab" aria-controls="pending" aria-selected="false">
                            PENDING ({{ count($approvals['pending']) }})
                        </a>
                      </li>
                      <li class="nav-item border-left">
                    	<a class="nav-link text-white h-100" id="discord-tab" data-toggle="pill" href="#discord" role="tab" aria-controls="discord" aria-selected="false">
                            DISCORD ACCs ({{ count($discord) }})
                        </a>
                      </li>
                    </ul>
                    <!-- #END# NAV TOP -->
					
                    <div class="col-14 rounded-b overflow-hidden shadow-lg bg-black opacity-90">
						<div class="px-6 py-4">
							<div class="tab-content" id="pills-tabContent">
								
								<div class="tab-pane fade {{ (!session()->has('approve')) ? 'show active' : '' }}" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                                    <div class="row px-4">
                                        @forelse($approvals['approved'] as $approval)
                                        <div class="mx-auto my-2 col-12 col-sm-6 col-md-4 col-lg-3">
                                            <div class="card col-12 h-100 text-black">
                                              <div class="card-body">
                                                <h5 class="card-title mb-0">{{ $approval->user_id }}</h5>
                                                <p class="card-text"><i>{{ ($approval->user) ? $approval->user->full_name : "Unknown" }}</i></p>
                                                <hr />
                                                <form method="POST" action="{{ route('users.revoke', ['cid' => $approval->user_id])}}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <!-- Your fields here -->
                                                    <button class="card-link pt-2 btn btn-danger text-white text-sm" action="submit">Revoke</button>
                                                </form>
                                              </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="mx-auto m-2 col-12 text-danger">
                                            NO USERS APPROVED
                                        </div>
                                        @endforelse
                                    </div>
								</div>

                                <div class="tab-pane fade {{ (session()->has('approve')) ? 'show active' : '' }}" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                    <div class="row px-4">
                                       
                                        <div class="mx-auto col-12">
                                            <div class="mx-auto my-2 col-12 col-sm-12 col-md-6 col-lg-4">
                                                <div class="card col-12 h-100 text-black">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-0">
                                                            RANDOM APPROVALS (WIP)
                                                        </h5>
                                                        <hr />
                                                        {{ Form::open(array('url' => route('users.random'), 'class' => 'mx-auto col-12 text-center')) }}
                                                            <input name="_method" type="hidden" value="PATCH">
                                                            <div class="col-12">
                                                                {{ Form::number('qty', '0', ['class' => 'bg-secondary text-white text-center col-10 col-sm-10 col-md-10 col-lg-8']) }}
                                                            </div>
                                                            {{ Form::submit('Rock it!', ['class' => 'card-link mt-3 btn btn-success text-white text-sm disabled', 'disabled' => 'disabled']) }}
                                                        {{ Form::close() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mx-auto col-12 text-white">
                                            <hr style="border-color: #fff;"/>
                                        </div>
                                        
                                        @forelse($approvals['pending'] as $approval)
                                        <div class="mx-auto my-2 col-12 col-sm-6 col-md-4 col-lg-3">
                                            <div class="card col-12 h-100 text-black">
                                                <div class="card-body">
                                                  <h5 class="card-title mb-0">{{ $approval->user_id }}</h5>
                                                  <p class="card-text"><i>{{ ($approval->user) ? $approval->user->full_name : "Unknown" }}</i></p>
                                                  <hr />
                                                  <form method="POST" action="{{ route('users.approve', ['cid' => $approval->user_id])}}">
                                                      @csrf
                                                      <input name="_method" type="hidden" value="PATCH">
                                                      <!-- Your fields here -->
                                                      <button class="card-link pt-2 btn btn-success text-white text-sm" action="submit">Approve</button>
                                                  </form>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="mx-auto m-2 col-12 text-success">
                                            NO PENDING APPROVALS
                                        </div>
                                        @endforelse
                                    </div>
								</div>
								
								<div class="tab-pane fade" id="discord" role="tabpanel" aria-labelledby="discord-tab">
                                    <div class="row px-4">
                                        @forelse($discord as $account)
                                        <div class="mx-auto my-2 col-12 col-sm-6 col-md-4 col-lg-3">
                                            <div class="card col-12 h-100 text-black">
                                              <div class="card-body">
                                                <h5 class="card-title mb-0">{{ $account['cid'] }}</h5>
                                                <hr />
                                                <p class="card-text"><i>{{ $account['name'] }}</i></p>
                                              </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="mx-auto m-2 col-12 text-danger">
                                            NO ACCOUNTS LINKED
                                        </div>
                                        @endforelse
                                    </div>
								</div>

							</div>
						</div>
                    </div>
                </div>
                
                <div class="py-2 pb-4">
                    <a href="{{ route('auth.logout') }}" class="no-underline"><p class="btn btn-blue text-white text-sm">Logout</p>
                    </a>
                </div>
            @endauth

        </div>
    </div>

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
            title: 'Success!',
            html: "{!! session('success') !!}",
            type: 'success'
        })
    </script>
@endif

@if(session()->has("error"))
    <script language="javascript">
        Swal.fire({
            title: 'Error!',
            html: "{!! session('error') !!}",
            type: 'error'
        })
    </script>
@endif

</body>
</html>
