<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <title>AFV Beta Prefile</title>
    <style type="text/css">
		p, td.instructions		{font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt;}
		td		{font-family: Arial, Helvetica, sans-serif; font-size: 8pt;}
		th		{font-family: Arial, Helvetica, sans-serif; font-size: 8pt; font-weight: bold;}
		.time	{font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10pt; font-weight: bold;}
		.error  {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10pt; font-weight: bold; color: #ff0000;}
		a       {color: #4475ae; text-decoration: none;}
		a:hover {color: #000080; text-decoration: none;}
		input	{text-align: center;}
		input.filled	{color: #777777;}
    </style>
</head>
    <body text="#000000" bgcolor="#ecf9ff" style="margin: 0px;">
        {{ Form::open(array('url' => route('prefile.submit'), 'style' => "margin: 0px;")) }}
            <table width="750" cellspacing="0" cellpadding="2" border="1" style="height: calc(100vh - 10px); width: calc(100% - 10px); margin: 5px;">
                <tbody>
                    <tr>
                        <td colspan="2" align="center">
                            <img src="{{ asset('images/logo.png') }}" width="175" height="64">
                        </td>
                        <td colspan="5">
                            <table width="100%" border="0">
                                <tbody>
									<tr align="center">
										<td><input type="submit" name="submit" value="File Flight Plan"></td>
									</tr>
								</tbody>
							</table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" style="text-align: center;"></td>
                    </tr>
                    <tr>
                        <th width="81">     {{ Form::label('1', '1. TYPE') }}                               </th>
                        <th width="107">    {{ Form::label('2', '2. CALLSIGN') }}                           </th>
                        <th width="124">    {{ Form::label('3', '3. AIRCRAFT TYPE/ SPECIAL EQUIPMENT') }}   </th>
                        <th width="61">     {{ Form::label('4', '4. TRUE AIRSPEED (KTS)') }}                </th>
                        <th width="80">     {{ Form::label('5', '5. DEPARTURE POINT') }}                    </th>
                        <th width="87">     {{ Form::label('6', '6. ESTIMATED DEPARTURE TIME (Z)') }}       </th>
                        <th width="124">    {{ Form::label('7', '7. CRUISING ALTITUDE') }}                  </th>
                    </tr>
                    <tr>
                        <td width="81">
                            {{ Form::radio('1', 'I', $fp_data['type'] == "I") }} IFR<br/>
                            {{ Form::radio('1', 'V', $fp_data['type'] != "I") }} VFR
                        </td>
                        <td width="107" align="center">
                            {{ Form::text('2', $fp_data['callsign'], (array_key_exists('callsign', $errors)) ? ['style' => 'border: medium solid red; text-transform: uppercase;'] : ['style' => 'text-transform: uppercase;'] ) }}
                        </td>
                        <td width="124" align="center">
                            {{ Form::text('3', $fp_data['actype'], (array_key_exists('actype', $errors)) ? ['style' => 'border: medium solid red; text-transform: uppercase;'] : ['style' => 'text-transform: uppercase;'] ) }}
                        </td>
                        <td width="61" align="center">
                            {{ Form::number('4', $fp_data['tas'], (array_key_exists('tas', $errors)) ? ['style' => 'border: medium solid red;'] : null ) }}
                        </td>
                        <td width="80" align="center">
                            {{ Form::text('5', $fp_data['origin'], (array_key_exists('origin', $errors)) ? ['style' => 'border: medium solid red; text-transform: uppercase;'] : ['style' => 'text-transform: uppercase;'] ) }}
                        </td>
                        <td width="87" align="center">
                            {{ Form::number('6', $fp_data['etd'], (array_key_exists('etd', $errors)) ? ['style' => 'border: medium solid red;'] : null ) }}
                        </td>
                        <td width="124" align="center">
                            {{ Form::number('7', $fp_data['altitude'], (array_key_exists('altitude', $errors)) ? ['style' => 'border: medium solid red;'] : null ) }}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="7"></td>
                    </tr>
                    <tr>
                        <th colspan="7">{{ Form::label('8', '8. FLIGHT ROUTE') }}</th>
                    </tr>
                    <tr>
                        <td colspan="7">{{ Form::textarea('8', $fp_data['route'], (array_key_exists('route', $errors)) ? ['style' => 'height: 100%; min-height: 100%; width: 100%; min-width:100%; border: medium solid red; text-transform: uppercase;'] : ['style' => 'height: 100%; min-height: 100%; width: 100%; min-width:100%; text-transform: uppercase;']) }}</td>
                    </tr>
                    
                    <tr>
                        <td colspan="7"></td>
                    </tr>

                    <tr>
                        <th width="81">     {{ Form::label('9', '9. DESTINATION') }}                            </th>
                        <th width="107">    {{ Form::label('10', '10. EST TIME ENROUTE (HOURS / MINUTES)') }}   </th>
                        <th width="124">    {{ Form::label('11a', '11a. VOICE CAPABILITIES') }}                 </th>
                        <th colspan="4">    {{ Form::label('11', '11. REMARKS (optional)') }}                   </th>
                    </tr>
                    <tr>
                        <td width="81" align="center">
                            {{ Form::text('9', $fp_data['destination'], (array_key_exists('destination', $errors)) ? ['style' => 'border: medium solid red; text-transform: uppercase;'] : ['style' => 'text-transform: uppercase;'] ) }}
                        </td>
                        <td width="107" align="center">
                            {{ Form::number('10a', $fp_data['etehrs'], (array_key_exists('etehrs', $errors)) ? ['style' => 'border: medium solid red;'] : null ) }}
                            {{ Form::number('10b', $fp_data['etemin'], (array_key_exists('etemin', $errors)) ? ['style' => 'border: medium solid red;'] : null ) }}
                        </td>
                        <td width="124">
                            {{ Form::radio('11a', '/V/', ($fp_data['voice'] != "/T/" && $fp_data['voice'] != "/R/")) }} Full Voice<br/>
                            {{ Form::radio('11a', '/R/', $fp_data['voice'] == "/R/") }} Receive Only<br/>
                            {{ Form::radio('11a', '/T/', $fp_data['voice'] == "/T/") }} Text Only<br/>
                        </td>
                        <td colspan="4" align="center">
                            {{ Form::textarea('11', $fp_data['remarks'], (array_key_exists('remarks', $errors)) ? ['style' => 'height: 100%; min-height: 100%; width: 100%; min-width:100%; border: medium solid red; text-transform: uppercase;'] : ['style' => 'height: 100%; min-height: 100%; width: 100%; min-width:100%; text-transform: uppercase;']) }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7"></td>
                    </tr>
                    
                    <tr>
                        <th colspan="2" align="left">12. FUEL ON BOARD<br><hr width="80%" align="left">
                            <table width="100%" border="0">
                                <tbody>
                                    <tr align="center">
                                        <th>    {{ Form::label('12a', 'HOURS') }}       </th>
                                        <th>    {{ Form::label('12b', 'MINUTES') }}     </th>
                                    </tr>
                                </tbody>
                            </table>
                        </th>
                        <th width="124">    {{ Form::label('13', '13. ALTERNATE AIRPORT (optional)') }}             </th>
                        <th colspan="2">    {{ Form::label('14', '14. PILOT\'S NAME') }}    </th>
                        <th width="87">     {{ Form::label('15', '15. VATSIM ID') }}                                </th>
                        <th width="124">    {{ Form::label('16', '16. VATSIM PASSWORD') }}                          </th>
                    </tr>
                    <tr>
                        <td colspan="2" align="left">
                            <table width="100%" border="0">
                                <tbody>
                                    <tr align="center">
                                        <td>{{ Form::number('12a', $fp_data['fobhrs'], (array_key_exists('fobhrs', $errors)) ? ['style' => 'border: medium solid red;'] : null ) }}</td>
                                        <td>{{ Form::number('12b', $fp_data['fobmin'], (array_key_exists('fobmin', $errors)) ? ['style' => 'border: medium solid red;'] : null ) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="124" align="center">
                            {{ Form::text('13', $fp_data['alternate'], (array_key_exists('alternate', $errors)) ? ['style' => 'border: medium solid red; text-transform: uppercase;'] : ['style' => 'text-transform: uppercase;'] ) }}
                        </td>
                        <td colspan="2" align="center">
                            {{ Form::text('14', $fp_data['name'], ['style' => 'text-transform: uppercase; width: 100%', 'class'=>'filled', 'readonly' => 'readonly'] ) }}
                        </td>
                        <td width="87" align="center">
                            {{ Form::number('15', $fp_data['cid'], ['class'=>'filled', 'readonly' => 'readonly'] ) }}
                        </td>
                        <td width="124" align="center">
                            {{ Form::input('password', '16', $fp_data['pwd'], (array_key_exists('pwd', $errors)) ? ['style' => 'border: medium solid red;'] : null ) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        {{ Form::close() }}

        @if(isset($success) || isset($error))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="sweetalert2.all.min.js"></script>
        <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        @endif

        @if(isset($success))
        <script>
            Swal.fire({
              title: "Great!",
              text: "{!! $success !!}",
              type: "success",
              confirmButtonText: "I don't care, go away!"
            })
        </script>
        @endif

        @if(isset($error))
        <script>
            Swal.fire({
              title: "Uh, oh...",
              text: "{!! $error !!}",
              type: "error",
              confirmButtonText: "#BlameAidan"
            })
        </script>
        @endif

    </body>
</html>