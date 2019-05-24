<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <title>AFV Beta Prefile</title>
    <style type="text/css">
		p, td.instructions		{font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt;}
		td		{font-family: Arial, Helvetica, sans-serif; font-size: 8pt;}
		th		{font-family: Arial, Helvetica, sans-serif; font-size: 8pt;}
		.time	{font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10pt; font-weight: bold;}
		.error  {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10pt; font-weight: bold; color: #ff0000;}
		a       {color: #4475ae; text-decoration: none;}
		a:hover {color: #000080; text-decoration: none;}
    </style>
</head>
    <body text="#000000" bgcolor="#ecf9ff">
        <form action="{{ route('prefile.post') }}" method="post">
            @csrf
            <table width="750" cellspacing="0" cellpadding="5" border="1">
                <tbody>
                    <tr>
                        <td colspan="2" align="center"><img src="/images/logo.png" width="175" height="64"></td>
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
                        <td colspan="7" style="text-align: center; text-decoration: underline;"><span class="error">Feature in development for the AFV-Beta</span></td>
                    </tr>
                    <tr>
                        <td width="81">1. TYPE</td>
                        <td width="107">2. CALLSIGN</td>
                        <td width="124">3. AIRCRAFT TYPE/<br>SPECIAL EQUIPMENT</td>
                        <td width="61">4. TRUE<br>AIRSPEED<br>(KTS)</td>
                        <td width="80">5. DEPARTURE<br>POINT</td>
                        <td width="87">6. DEPARTURE<br>TIME<br><hr>PROPOSED (Z)</td>
                        <td width="124">7. CRUISING <br>ALTITUDE</td>
                    </tr>
                    <tr>
                        <td width="81">
                            <input type="radio" value="V" name="1"> VFR<br>
                            <input type="radio" checked="checked" value="I" name="1"> IFR
                        </td>
                        <td width="107">
                            <input size="9" name="2" style="text-transform: uppercase;">
                        </td>
                        <td width="124">
                            <input size="8" name="3" style="text-transform: uppercase;">
                        </td>
                        <td width="61">
                            <input size="3" name="4">
                        </td>
                        <td width="80">
                            <input size="7" name="5" style="text-transform: uppercase;">
                        </td>
                        <td width="87" align="center">
                            <input size="4" name="6">
                        </td>
                        <td width="124">
                            <input size="5" name="7" style="text-transform: uppercase;">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7"><b>8. ROUTE OF FLIGHT</b></td>
                    </tr>
                    <tr>
                        <td colspan="7"><textarea name="8" rows="4" cols="80" style="text-transform: uppercase;"></textarea></td>
                    </tr>
                    <tr>
                        <td width="81">9. DESTINATION</td>
                        <td width="107">10. EST TIME <br> ENROUTE<br><hr>HOURS / MINUTES</td>
                        <td width="124">11a. VOICE <br>CAPABILITIES</td>
                        <td colspan="4">11. REMARKS (optional)</td>
                    </tr>
                    <tr>
                        <td width="81"><input size="7" name="9" style="text-transform: uppercase;"></td>
                        <td width="107">
                            <input size="4" name="10a">
                            <input size="4" name="10b">
                        </td>
                        <td width="124">
                            <input type="radio" name="voice" value="/V/">Full Voice<br>
                            <input type="radio" name="voice" value="/R/">Receive Only<br>
                            <input type="radio" name="voice" value="/T/">Text Only
                        </td>
                        <td colspan="4"> <textarea name="11" rows="4" cols="35" style="text-transform: uppercase;"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="left">12. FUEL ON BOARD<br><hr width="80%" align="left">
                            <table width="100%" border="0">
                                <tbody><tr align="center">
                                    <td>HOURS</td>
                                    <td>MINUTES</td>
                                </tr>
                            </tbody></table>
                        </td>
                        <td width="124">13. ALTERNATE <br> AIRPORT<br>(optional)</td>
                        <td colspan="2">14. PILOT'S NAME &amp;<br> AIRCRAFT HOME BASE</td>
                        <td width="87">15. VATSIM ID</td>
                        <td width="124">16. VATSIM PASSWORD</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="left">
                            <table width="100%" border="0">
                                <tbody><tr align="center">
                                    <td><input size="7" name="12a"></td>
                                    <td><input size="7" name="12b"></td>
                                </tr>
                            </tbody></table>
                        </td>
                        <td width="124"><input size="7" name="13" style="text-transform: uppercase;"></td>
                        <td colspan="2"><input name="14" style="text-transform: uppercase;"></td>
                        <td width="87"><input size="12" name="15"></td>
                        <td width="124"><input size="12" name="16" type="password"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    

</body></html>