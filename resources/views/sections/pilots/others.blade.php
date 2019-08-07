@extends('layouts.master')
@section('title', 'Other Pilot Clients')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1 class="m-0 text-dark">Other Pilot Clients</h1>
        </div>
        <div class="card-body">
            <p>Until your pilot client gets updated, you will need to download and install the standalone client available at the link below.
            Once you have installed the standalone client, connect your desired pilot client manually to <u>afv-beta-fsd.vatsim.net</u>.
            Then, open the <i>Audio For VATSIM</i> application which you installed earlier on, configure your settings and press 'Connect'.</p>
            <a class="btn btn-primary" href="{{ route('client.download') }}">Download Standalone Client</a>
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