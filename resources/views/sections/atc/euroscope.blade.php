@extends('layouts.master')
@section('title', 'Euroscope')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1 class="m-0 text-dark">Euroscope</h1>
        </div>
        <div class="card-body">
            <p>To use Euroscope with AFV, you will need to download and install the standalone client from the link below.
            Ensure that you are running the latest <a href="http://185.51.64.10/~euroscop/install/EuroScopeBeta32a20.zip">Euroscope beta</a> and download the 
            shortcut available for download below. Whenever you want to use AFV Beta you will have to run Euroscope using this shortcut, as it will ensure that 
            you don't get connected to old voice. Then, connect Euroscope to <u>afv-beta-fsd.vatsim.net</u> and run the standalone client you previously installed.</p>
            <div class="w-100 text-center"><img src="{{ asset('images/demos/es_comms_full.png') }}" class="img-fluid rounded"></div>
            <p class="text-danger my-2"><b>IMPORTANT:</b> If not using the shortcut provided, please make sure to fill the voice server/channel with random crap so you do not interfere with the live network! Also, do not mark the XMT/RCV voice checkboxes.</p>
            <div class="row my-0">
                <a class="btn btn-primary mx-1 mt-1" href="{{ route('client.download') }}">Download Standalone Client</a>
                <a class="btn btn-primary mx-1 mt-1" href="https://www.dropbox.com/s/pq4gwibza71ruw5/EuroScope%20%28AFV%29.zip?dl=0">Download Euroscope AFV Shortcut</a>
            </div>
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