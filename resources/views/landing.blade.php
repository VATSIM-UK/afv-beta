<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>AFV Test</title>
</head>
<body class="bg-image font-sans select-none">

<div class="flex items-center h-screen text-white">
    <div class="mx-auto text-center">

        <div class="pb-4">
            <img src="images/logo.png"
                 class="h-32"/>

            <h1 class="text-5xl font-bold">Audio For VATSIM</h1>
        </div>

        @auth
            <div class="py-4">
                <p><strong>{{ auth()->user()->name_first }}</strong>, do you want the chance to try our new voice
                    system?</p>
            </div>

            <div class="py-4">
                <a class="no-underline" href="{{ route('request') }}">
                    <btn class="btn btn-blue">Sign Me Up!</btn>
                </a>
            </div>

            <div>
                <a href="{{ route('auth.logout') }}" class="no-underline"><p class="text-white text-xs">No
                        thanks!</p></a>
            </div>
        @endauth

        @guest
            <div class="py-4">
                <a class="no-underline" href="{{ route('auth.login') }}">
                    <btn class="btn btn-blue">Login With VATSIM SSO</btn>
                </a>
            </div>
        @endguest

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

@if(session()->has("success"))
    <script language="javascript">
        Swal.fire({
            title: 'Success!',
            html: "{!! session("success") !!}",
            type: 'success'
        })
    </script>
@endif

@if(session()->has("error"))
    <script language="javascript">
        Swal.fire({
            title: 'Error!',
            html: "{!! session("error") !!}",
            type: 'error'
        })
    </script>
@endif

</body>
</html>
