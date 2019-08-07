@extends('layouts.master')
@section('title', 'vATIS')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1 class="m-0 text-dark">vATIS</h1>
        </div>
        <div class="card-body">
            <iframe src="http://vatis.clowd.io/docsafv" style="width:100%; min-height:700px;"></iframe>
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