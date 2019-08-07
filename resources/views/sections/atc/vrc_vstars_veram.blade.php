@extends('layouts.master')
@section('title', 'VRC, vSTARS, vERAM')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1 class="m-0 text-dark">VRC, vSTARS, vERAM</h1>
        </div>
        <div class="card-body">
            <p>First of all, you will need to download and install the standalone client from the link below. Once that's done, do the same for your preferred ATC client.
            After installing it, you will see a new shortcut in your desktop. Use this shortcut to run your ATC client when connecting to AFV. Select any server from the list, and
            prime your frequency only. <b>Do not select any other audio options on the communications panel</b>. Start the standalone client you previously installed and connect it as well. You should then be connected!</p>
            <div class="w-100 text-center mb-3"><img src="{{ asset('images/demos/vClients.jpeg') }}" class="img-fluid rounded"></div>
            <div class="row mt-0">
                <a class="btn btn-primary mx-1 mt-1" href="{{ route('client.download') }}">Download Standalone Client</a>
                <a class="btn btn-primary mx-1 mt-1" href="http://vpilot.metacraft.com/Assets/Files/Installers/AfvBeta/VRC-AFVBeta.exe">Download VRC AFV Installer</a>
                <a class="btn btn-primary mx-1 mt-1" href="http://vpilot.metacraft.com/Assets/Files/Installers/AfvBeta/vSTARS-Setup-1.1.8.1.exe">Download vSTARS AFV Installer</a>
                <a class="btn btn-primary mx-1 mt-1" href="http://vpilot.metacraft.com/Assets/Files/Installers/AfvBeta/vERAM-Setup-1.0.7072.31690.exe">Download vERAM AFV Installer</a>
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