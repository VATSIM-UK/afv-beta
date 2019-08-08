@extends('layouts.master')
@section('title', 'Reporting Issues')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h1 class="m-0 text-dark">How to report issues</h1>
        </div>
        <div class="card-body">
          <ul>
            <li>If your issue requires <i>'urgent'</i> assistance (for example, if you can't connect, can't hear others, etc...), then you should ask for assistance in the
            <a href="{{ route('home') }}">Discord Server</a>. The Developers and Support Team members will help you out ASAP.</li>
            <li>If your issue does not require immediate attention or you would simply like to give feedback about the new voice system, then please use <a href="https://forms.gle/rQ4LChwn4EvSCLWZ9" target="_blank">this form</a>.
            Any error details can be copy-pasted into the <i>'details'</i> field.
          </ul>
          <p class="text-danger my-2"><b>HOLD ON!</b> Before reporting any issues or asking for assistance please check below that they have not already been reported. And ALWAYS, ALWAYS <i>#BlameAidan</i>.</p>
        </div>
      </div>
      <!-- /.card -->
      
      <div class="card">
        <div class="card-header">
          <h1 class="m-0 text-dark">Known Issues</h1>
        </div>
        <div class="card-body">
          @forelse ($issues as $issue)
          <div class="card">
            <div class="card-body">
              <h6 class="card-title font-bold">
                <u>{{ $issue['title'] }}</u>
              </h6>
              <p class="card-text">
                {!! $issue['body'] !!}
              </p>
            </div>
          </div>
          @empty
          <div class="card">
            <div class="card-body text-success">
              <h6 class="card-title font-bold">None</h6>
              <p class="card-text">We have somehow managed to solve all that was wrong. Hip Hip Hooray!</p>
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