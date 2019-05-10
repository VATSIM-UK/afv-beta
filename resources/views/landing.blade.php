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

<div class="flex flex-col justify-between h-full">
    <div class="flex items-center h-full text-white sm:mb-4 lg:mb-0">
        <div class="mx-auto text-center">

            <div class="pb-4">
                <img src="images/logo.png"
                     class="h-32"/>

                <h1 class="text-5xl font-bold">Audio For VATSIM</h1>
            </div>

            @auth
                <div class="py-4">
                    @if(auth()->user()->pending)
                        <p><strong>{{ auth()->user()->name_first }}</strong>, thanks for expressing your interest in the
                            beta!<br/>We'll be in touch soon.</p>
                    @elseif(auth()->user()->approved)
                        <div class="max-w-xl rounded overflow-hidden shadow-lg bg-grey-lighter opacity-75">
                            <div class="px-6 py-4">
                                <div class="font-bold text-2xl mb-2 text-grey-darkest">Welcome!</div>
                                <br />
                                <p class="text-grey-darker text-base text-left">
                                    The first round of Audio for Vatsim (AFV) will be taking place on a standalone server along side the existing network in order to minimize disruption to live users on the old voice codec.
                                </p>
                                <br />
                                <p class="text-grey-darker text-base text-left">
                                    You can chat with the new voice team via discord at <a href="https://discord.gg/wTdWD5s">https://discord.gg/wTdWD5s</a> for any help and advice during the setup process.
                                </p>
                                <br />
                                <div class="font-bold text-xl mb-2 text-grey-darkest">Pilots</div>
                                <br />
                                <p class="text-black font-bold text-lg text-left">
                                    vPilot Users
                                </p>
                                <p class="text-grey-darker text-base text-left">
                                    To use new voice as a vPilot user is very simple!  Download the vPilot Beta from <a href="http://vpilot.metacraft.com/Assets/Files/Installers/AfvBeta/vPilotAFVBeta-Setup-2.2.2.1.exe">Here</a>.  You DO NOT need the beta client listed below.
                                </p>
                                <br />
                                <p class="text-black font-bold text-lg text-left">
                                    FS9, FSX, P3D, X-Squawkbox Users, Swift
                                </p>
                                <p class="text-grey-darker text-base text-left">
                                    As your client has not been updated to use new voice at this time you will need to download the simple standalone voice client from <a href="https://s3.ca-central-1.amazonaws.com/vatsim/Audio+For+VATSIM.msi">Here</a>, once downloaded, connect your client to the AFV-BETA (100.26.210.105) server, run the client and follow the instructions
                                </p>
                                <br />
                                <div class="font-bold text-xl mb-2 text-grey-darkest">Controllers</div>
                                <br />
                                <p class="text-grey-darker text-base text-left">
                                    In order to finalise the ATC components of AFV you will be running a standalone client which will allow us to push updates out during testing.
                                </p>
                                <br>
                                <p class="text-grey-darker text-base text-left">
                                    1) Download the standalone client from <a href="https://s3.ca-central-1.amazonaws.com/vatsim/Audio+For+VATSIM.msi">Here</a>, once downloaded run the client and follow the instructions.
                                </p>
                                <br>
                                <p class="text-grey-darker text-base text-left">
                                    2) Connect your controller client to the AFV Beta server at 100.26.210.105.
                                </p>
                                <br>
                                <p class="text-grey-darker text-base text-left">
                                    3) Setup a text Primary Frequency, and a text ATIS in order for AFV to work. Do not setup a voice channel in your controller client.
                                </p>
                                <br>
                                <p class="text-grey-darker text-base text-left">
                                    You can choose the location and strength of your transceivers by setting visibility points and range in your controller client. (.vis1, .vis2 etc in Euroscope)
                                </p>
                                <br />
                                <div class="font-bold text-xl mb-2 text-grey-darkest">Supervisors</div>
                                <br />
                                <p class="text-grey-darker text-base text-left">
                                    You will get a copy of the supervisor client from Tim Barber in order to help supervise the events.
                                </p>
                                <br />
                                <div class="font-bold text-xl mb-2 text-grey-darkest">ATIS Bots</div>
                                <br />
                                <p class="text-grey-darker text-base text-left">
                                    A few sample ATIS bots have been setup to supply automatically generated ATISes. If a controller logs on then these ATISes get replaced with those of a controller.
                                </p>
                                <br>
                                <p class="text-grey-darker text-base text-left">
                                    There will be a website for divisions to configure their ATIS bots with rules such as runway alternations, preferred runways or custom voice files as the beta progresses.
                                </p>
                                <br>
                                <p class="text-grey-darker text-base text-left">
                                    For now please use the reporting tool to report any weird phrases spoken by the ATIS bot, they have provided many hours of comedy audio during the development!
                                </p>
                                <br />
                                <div class="font-bold text-xl mb-2 text-grey-darkest">Live Map</div>
                                <br />
                                <p class="text-grey-darker text-base text-left">
                                    See who is connected to new voice at <a href="https://afv-map.vatsim.net">https://afv-map.vatsim.net</a> and feel free to try things out with friends on the new beta.
                                </p>
                                <br />
                                <div class="font-bold text-xl mb-2 text-grey-darkest">Formal Testing</div>
                                <br />
                                <p class="text-grey-darker text-base text-left">
                                    We plan to run several rounds of testing at specific regions and airports, these will be advertised here and via an email before the events.
                                </p>
                                <br>
                                <p class="text-grey-darker text-base text-left">
                                    Friday 10th May 1800z-1930z - Fly around the UK with Top down cover from London and Aerodrome control at EGLL/EGKK/EGSS/EGCC etc.
                                </p>
                                <br />
                                <div class="font-bold text-xl mb-2 text-grey-darkest">Current Known Issues</div>
                                <br />
                                <p class="text-grey-darker text-base text-left">
                                    1) When ‘de-tuning’ from an ATIS Frequency it could take 5 seconds for the audio to stop. This will be fixed before release
                                </p>
                                <br>
                                <p class="text-grey-darker text-base text-left">
                                    2) Windows 7 users will need to add <a href="https://s3.ca-central-1.amazonaws.com/vatsim/TLS_1.2.reg">this registry key</a> in order to enable TLS 1.2 if they haven’t already done so or they will get a ‘Connect Failed’ when connecting to voice
                                </p>
                                <br />
                                <div class="font-bold text-xl mb-2 text-grey-darkest">Reporting Issues</div>
                                <br />
                                <p class="text-grey-darker text-base text-left">
                                    For live support please contact us via the discord link at the top of this post.
                                </p>
                                <br>
                                <p class="text-grey-darker text-base text-left">
                                    We have a feedback form <a href="https://forms.gle/rQ4LChwn4EvSCLWZ9">here</a> for you to report issues and post your thoughts on AFV
                                </p>
                            </div>
                        </div>
                    @else
                        <p><strong>{{ auth()->user()->name_first }}</strong>, do you want the chance to try our new
                            voice
                            system?</p>
                    @endif
                </div>

                @if(!auth()->user()->has_request)
                    <div class="py-4">
                        <a class="no-underline" href="{{ route('request') }}">
                            <btn class="btn btn-blue">Sign Me Up!</btn>
                        </a>
                    </div>
                @endif

                <div>
                    <a href="{{ route('auth.logout') }}" class="no-underline"><p class="text-white text-xs">Logout</p>
                    </a>
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
    <footer class="flex items-center bg-grey-light p-2 opacity-75">
        <div class="flex-1">
            <p class="flex justify-center items-center tracking-wide">
                A <img src="images/vatsim_0.png" width="8%"> Network Site</p>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

@if(session()->has("success"))
    <script language="javascript">
        Swal.fire({
            title: "{!! session('success')[0] !!}",
            html: "{!! session('success')[1] !!}",
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
