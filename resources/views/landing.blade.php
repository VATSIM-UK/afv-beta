<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ mix('css/app.css') }} ">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>AFV Test</title>
</head>
<body class="bg-image font-sans select-none">

@auth
@if(auth()->user()->approved)
<div class="flex flex-col justify-between h-full">
@else
<div class="flex flex-col justify-between h-screen">
@endif
@endauth

@guest
<div class="flex flex-col justify-between h-screen">
@endguest
    <div class="flex items-center h-full text-white sm:mb-4 lg:mb-0">
        <div class="mx-auto text-center pt-4">

            <div>
                <img src="images/logo.png" class="h-32"/>
                <h1 class="text-5xl font-bold">Audio For VATSIM</h1>
            </div>

            @auth
                <div class="py-4">
                    @if(auth()->user()->pending)
                        <p><strong>{{ auth()->user()->name_first }}</strong>, thanks for expressing your interest in the
                            beta!<br/>We'll be in touch soon.</p>
                    @elseif(auth()->user()->approved)
                    <div class="max-w-xl rounded overflow-hidden shadow-lg bg-grey-lighter opacity-90">
                        <!-- NAV TOP -->
                        <ul class="nav justify-content-center nav-justified bg-blue">
                          <li class="nav-item">
                            <a class="nav-link text-white" href="#pClients">PILOTS</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-white" href="#cClients">CONTROLLERS</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-white" href="#sups">SUPERVISORS</a>
                          </li>
                        </ul>
                        <!-- #END# NAV TOP -->
                        <!-- NAV MIDDLE -->
                        <ul class="nav justify-content-center nav-justified bg-blue">
                          <li class="nav-item">
                            <a class="nav-link text-white" href="#atis">ATIS BOTS</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-white" href="#issues">ISSUES</a>
                          </li>
                        </ul>
                        <!-- #END# NAV MIDDLE -->

                        <div class="px-6 py-4">
                            <!-- WELCOME -->
                            <div class="font-bold text-2xl mb-2 text-grey-darkest underline" id="welcome">WELCOME!</div>
                            <p class="text-grey-darker text-base text-left">
                                The first rounds of Audio For VATSIM testing will be taking place on a standalone server to minimize disruption to other users of the network.
                                This means that you will only be able to see controllers and pilots who are part of the AFV testing program, and <u>will not be able to use AFV on the live VATSIM network</u>.
                            <br /><br />
                                Want to chat with the rest of the testing team? Need help from the devs? Join us at <a href="https://discord.gg/wTdWD5s">https://discord.gg/wTdWD5s</a>!
                            </p>
                            <!-- #END# WELCOME -->

                            <!-- Live MAP -->
                            <div class="py-2 pt-4">
                                <a href="https://afv-map.vatsim.net/" class="no-underline"><p class="btn btn-blue text-white text-md">AFV Live Map</p>
                                </a>
                            </div>
                            <!-- #END# LIVE MAP -->

                            <!-- SECTION SPACING -->
                            <hr/>
                            <br/>
                            <!-- #END# SECTION SPACING -->

                            <!-- PILOT CLIENTS -->
                            <div class="font-bold text-2xl mb-2 text-grey-darkest underline" id="pClients">PILOT CLIENTS</div>

                            <br />

                            <!-- vPilot -->
                            <p class="text-black font-bold text-lg text-left italic" id="vPilot">
                                vPilot
                            </p>
                            <p class="text-grey-darker text-base text-left">
                                To use new voice as a vPilot user is very simple!  Download the vPilot Beta from <a href="http://vpilot.metacraft.com/Assets/Files/Installers/AfvBeta/vPilotAFVBeta-Setup-2.2.2.3.exe">Here</a> and run the relevant vPilot (AFV Beta) Shortcuts.
                                You may choose any server when connecting, as this client will automatically route you to the AFV-Beta server.<br />
                                You DO NOT need the standalone client listed below.<br /><br />
                            </p>
                            <!-- #END# vPilot -->

                            <!-- Other PClients -->
                            <p class="text-black font-bold text-lg text-left italic" id="otherPCls">
                                Others (XSquawkBox, swift, etc...)
                            </p>
                            <p class="text-grey-darker text-base text-left">
                                These clients have not yet been updated to use the new voice system, so at this time you will have to download the standalone voice client from <a href="https://s3.ca-central-1.amazonaws.com/vatsim/Audio+For+VATSIM.msi">Here</a>.
                                Once downloaded, open your client and connect it to the AFV-BETA server (afv-beta-fsd.vatsim.net). Then run the standalone voice client and follow the instructions.
                            </p>
                            <!-- #END# Other PClients -->
                            <!-- #END# Pilot Clients -->


                            <!-- SECTION SPACING -->
                            <br/>
                            <hr/>
                            <br/>
                            <!-- #END# SECTION SPACING -->

                            <!-- CONTROLLER Clients -->
                            <div class="font-bold text-2xl mb-2 text-grey-darkest underline" id="cClients">CONTROLLER CLIENTS (ALL)</div>

                            <br />

                            <p class="text-grey-darker text-base text-left">
                                1) Download the standalone voice client from <a href="https://s3.ca-central-1.amazonaws.com/vatsim/Audio+For+VATSIM.msi">Here</a>.
                                    Run it and follow the instructions to setup AFV.<br />
                                2) Download the latest version of your ATC client:<br />
                            </p>
                            <ul class="text-grey-darker text-base text-left">
                              <li><a href="http://185.51.64.10/~euroscop/install/EuroScopeBeta32a20.zip">Euroscope</a></li>
                              <li><a href="http://vpilot.metacraft.com/Assets/Files/Installers/AfvBeta/VRC-AFVBeta.exe">VRC</a></li>
                              <li><a href="http://vpilot.metacraft.com/Assets/Files/Installers/AfvBeta/vSTARS-Setup-1.1.8.1.exe">vStars</a></li>
                              <li><a href="http://vpilot.metacraft.com/Assets/Files/Installers/AfvBeta/vERAM-Setup-1.0.7072.31690.exe">vERAM</a></li>
                            </ul>
                            <p class="text-grey-darker text-base text-left">
				        		3) If using Euroscope, use the shortcut <a href="https://www.dropbox.com/s/pq4gwibza71ruw5/EuroScope%20%28AFV%29.zip?dl=0"> Here</A> to launch Euroscope disabling old voice. If using any client other than Euroscope, copy the downloaded file into the client's install folder and run it.<br />
				        		4) Connect to the AFV Beta server by typing the address (afv-beta-fsd.vatsim.net) into the server field or selecting the AFV-Beta server from the list.<br />
                                5) Run the standalone voice client alongside. All voice communications will run through it.<br /><br />

                                <i>Note: To get an ATIS station online, all you have to do is connect it to the network as you normally would,
                                but <b>you don't have to start the voice playback</b>. In other words, you only have to connect the 'text-ATIS' and then AFV
                                servers will automatically read it on voice </i>😲.<br/><br/>

                                <i>If you want to listen to other controllers, you will have to tune your primary frequency to the same as theirs.
                                This will be changed during the development so that it can be done the same way as with old voice.</i><br /><br />

                                <i>Your radio range and transceiver positions are calculated from your vis points. Wherever you have a vis point,
                                you have a radio antenna with the same range as your ATC client.</i>
				        	</p>
                            <!-- #END# CONTROLLER Clients -->

                            <!-- SECTION SPACING -->
                            <br/>
                            <hr/>
                            <br/>
                            <!-- #END# SECTION SPACING -->

                            <!-- SUPS -->
                            <div class="font-bold text-2xl mb-2 text-grey-darkest underline" id="sups">SUPERVISORS</div>
                            <br />
                            <p class="text-grey-darker text-base text-left">
                                You will get a copy of the supervisor client from Tim Barber in order to help supervise the events.
                            </p>
                            <!-- #END# SUPS -->

                            <!-- SECTION SPACING -->
                            <br/>
                            <hr/>
                            <br/>
                            <!-- #END# SECTION SPACING -->

                            <!-- ATIS -->
                            <div class="font-bold text-2xl mb-2 text-grey-darkest underline" id="atis">ATIS BOTS</div>
                            <br />
                            <p class="text-grey-darker text-base text-left">
                                A few sample ATIS bots have been setup to supply automatically generated ATISes. If a controller logs on then these ATISes get replaced with those of a controller.
                                As the beta progresses, there will be a website for divisions to configure their ATIS bots with rules such as runway configurations or the possibility of uploading custom voice files.<br /><br />
                            </p>

                            <audio controls>
                                <source src="/audio/atis_demo.mp3" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            <div class="text-grey-darkest">ATIS Demo</div>

                            <br />
                            <p class="text-grey-darker text-base text-left">
                                For now please use the reporting tool to report any weird phrases spoken by the ATIS bot, they have provided many hours of comedy audio during the development!
                            </p>
                            <!-- #END# ATIS -->

                            <!-- SECTION SPACING -->
                            <br/>
                            <hr/>
                            <br/>
                            <!-- #END# SECTION SPACING -->

                            <!-- ISSUES -->
                            <div class="font-bold text-2xl mb-2 text-grey-darkest underline" id="issues">ISSUES</div>

                            <br />

                            <!-- Known Issues -->
                            <p class="text-black font-bold text-lg text-left italic" id="knownIssues">
                                Known Issues
                            </p>
                            <p class="text-grey-darker text-base text-left">
                                1) When ‘de-tuning’ from an ATIS Frequency it could take 5 seconds for the audio to stop. This will be fixed before release. <br />
                                2) Windows 7 users will need to add <a href="https://s3.ca-central-1.amazonaws.com/vatsim/TLS_1.2.reg">this registry key</a> in order to enable TLS 1.2 if they haven’t already done so or they will get a ‘Connect Failed’ when connecting to voice. <br />
                                3) Errounious blocking tone with receiving on COM1 and COM2 at the same time.<br />
                                4) Wrong RX Light Lights Up <br />
                                5) AFV Standalone Doesn't Connect to X-Plane <br />
                                6) Audio Calibration <br />
                            </p>
                            <!-- #END# Known Issues -->

                            <br />

                            <!-- Reporting Issues -->
                            <p class="text-black font-bold text-lg text-left italic" id="reportingIssues">
                                Reporting Issues
                            </p>
                            <p class="text-grey-darker text-base text-left">
                                For live support please contact us via the Discord link <a href="#welcome">at the top of this page</a>.<br />
                                We also have a feedback form <a href="https://forms.gle/rQ4LChwn4EvSCLWZ9">Here</a> for you to report issues and post your thoughts on AFV.<br />
                            </p>
                            <!-- #END# Reporting Issues -->
                                
                            <!-- #END# ISSUES -->
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

                
                <div class="py-4 pt-2">
                    <a href="{{ route('auth.logout') }}" class="no-underline"><p class="btn btn-blue text-white text-xs">Logout</p>
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
