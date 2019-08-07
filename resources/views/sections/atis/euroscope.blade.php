@extends('layouts.master')
@section('title', 'Euroscope ATIS')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1 class="m-0 text-dark">Euroscope ATIS</h1>
        </div>
        <div class="card-body">
            <p>In order to put an ATIS with Euroscope up, you only need to connect a text ATIS. <u>Do not <i>"Start multiple record playback"</i></u> in the voice ATIS setup dialogue.
            In the voice communications dialogue, you only need the ATIS box checked. The XMT/RCV VOI boxes should not be checked.</p>
            <p class="text-danger my-2"><b>IMPORTANT:</b> If not using Euroscope's AFV shortcut, please make sure to fill the voice server/channel for the ATIS station with random crap as well so you do not interfere with the live network!</p>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection