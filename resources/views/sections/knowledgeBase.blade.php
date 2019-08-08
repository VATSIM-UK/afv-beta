@extends('layouts.master')
@section('title', 'Knowledge Base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h1 class="m-0 text-dark">Knowledge Base</h1>
        </div>
        <div class="card-body">
          @forelse ($knowledgeBase as $knowledge)
          <div class="card">
            <div class="card-body">
              <h6 class="card-title font-bold">
                <u>{{ $knowledge['title'] }}</u>
              </h6>
              <p class="card-text">
                {!! $knowledge['body'] !!}
              </p>
            </div>
          </div>
          @empty
          <div class="card">
            <div class="card-body">
              <h6 class="card-title font-bold">None</h6>
              <p class="card-text">What's 1 + 1? We don't know, else we wouldn't be asking!</p>
            </div>
          </div>
          @endforelse
        </div>
      </div>
      <!-- /.card -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection