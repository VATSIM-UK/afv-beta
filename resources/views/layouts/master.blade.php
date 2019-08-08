<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>{{ config('app.name') }} | @yield('title')</title>
  @section('css')
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @show
</head>

<body>
    <div class="wrapper">
      @include('partials._top_nav')
      @include('partials._left_sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
      </div>
      <!-- /.content-wrapper -->
      @include('partials._footer')
    </div>
    <!-- ./wrapper -->

    @section('scripts')
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/AdminLTE.js') }}"></script>
    @show

    @if(session()->has("error") || session()->has("success") || session()->has("warn"))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    @if(session()->has("error"))
    <script language="javascript">
        Swal.fire({
            title: "{{ session('error')[0] }}",
            html: "{{ session('error')[1] }}",
            type: 'error'
        })
    </script>
    @endif
    @if(session()->has("warn"))
    <script language="javascript">
        Swal.fire({
            title: "{{ session('warn')[0] }}",
            html: "{{ session('warn')[1] }}",
            type: 'warning'
        })
    </script>
    @endif
    @if(session()->has("success"))
    <script language="javascript">
        Swal.fire({
            title: "{{ session('success')[0] }}",
            html: "{{ session('success')[1] }}",
            type: 'success'
        })
    </script>
    @endif
    @endif
</body>
</html>
