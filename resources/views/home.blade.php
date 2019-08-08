@extends('layouts.master')
@section('title', 'Home')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="card w-100">
      @guest
      <div class="card-header">
        <h1 class="m-0 text-dark">Welcome to the {{ config('app.name') }} Website!</h1>
      </div>
      <div class="card-body">
        In order to access the site, you must first <a href="{{ route('auth.login') }}">log in using your VATSIM Account</a>.
      </div>
      @else
      <div class="card-header">
        <h1 class="m-0 text-dark">Hi, {{ auth()->user()->name_first }}!</h1>
      </div>
      <div class="card-body">
        @approved
          Take a look at the different menus on the left. There you will find everything you need to start testing.<br>
          Thanks for your help,<hr>
          <i>The AFV Team</i>
        @endapproved
        @pending
          We have received your request to join the beta and will get in touch with you soon!</br>
          Many thanks,<hr>
          <i>The AFV Team</i>
        @endpending
        @hasnorequest
          Do you want the chance to try our new voice system?<hr>
          <a class="btn btn-primary" href="{{ route('request') }}">Sign me up!</a>
        @endhasnorequest
      </div>
      @endguest
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
        
    @auth
    @approved
    <div class="content flex-fill d-flex pb-4">
      <div class="row w-100 mx-auto">
        <div class="col">
          <iframe src="https://discordapp.com/widget?id=551514966058860544&theme=light" class="h-100 w-100 discord-widget"></iframe>
        </div>
        <!-- /.col -->
      </div>
    </div>
    @endapproved
    @endauth
    </div>
    <!-- /.row -->
@endsection