<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Use the latest (edge) version of IE rendering engine -->
    <title>EmailTemplate-Responsive</title>
    <!-- The title tag shows in email notifications, like Android 4.4. -->
    <!-- Please use an inliner tool to convert all CSS to inline as inpage or external CSS is removed by email clients -->
    <!-- important in CSS is used to prevent the styles of currently inline CSS from overriding the ones mentioned in media queries when corresponding screen sizes are encountered -->

    <!-- CSS Reset -->
    <style type="text/css">
/* What it does: Remove spaces around the email design added by some email clients. */
      /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
html, body {
	margin: 0 !important;
	padding: 0 !important;
	height: 100% !important;
	width: 100% !important;
}
/* What it does: Stops email clients resizing small text. */
* {
	-ms-text-size-adjust: 100%;
	-webkit-text-size-adjust: 100%;
}
/* What it does: Forces Outlook.com to display emails full width. */
.ExternalClass {
	width: 100%;
}
/* What is does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
	margin: 0 !important;
}
/* What it does: Stops Outlook from adding extra spacing to tables. */
table, td {
	mso-table-lspace: 0pt !important;
	mso-table-rspace: 0pt !important;
}
/* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
table {
	border-spacing: 0 !important;
	border-collapse: collapse !important;
	table-layout: fixed !important;
	margin: 0 auto !important;
}
table table table {
	table-layout: auto;
}
/* What it does: Uses a better rendering method when resizing images in IE. */
img {
	-ms-interpolation-mode: bicubic;
}
/* What it does: Overrides styles added when Yahoo's auto-senses a link. */
.yshortcuts a {
	border-bottom: none !important;
}
/* What it does: Another work-around for iOS meddling in triggered links. */
a[x-apple-data-detectors] {
	color: inherit !important;
}
</style>

    <!-- Progressive Enhancements -->
    <style type="text/css">
/* What it does: Hover styles for buttons */
.button-td,  .button-a {
	transition: all 100ms ease-in;
}
.button-td:hover,  .button-a:hover {
	background: #555555 !important;
	border-color: #555555 !important;
}

/* Media Queries */
@media screen and (max-width: 600px) {
.email-container {
	width: 100% !important;
}
/* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
.fluid,  .fluid-centered {
	max-width: 100% !important;
	height: auto !important;
	margin-left: auto !important;
	margin-right: auto !important;
}
/* And center justify these ones. */
.fluid-centered {
	margin-left: auto !important;
	margin-right: auto !important;
}
/* What it does: Forces table cells into full-width rows. */
.stack-column,  .stack-column-center {
	display: block !important;
	width: 100% !important;
	max-width: 100% !important;
	direction: ltr !important;
}
/* And center justify these ones. */
.stack-column-center {
	text-align: center !important;
}
/* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
.center-on-narrow {
	text-align: center !important;
	display: block !important;
	margin-left: auto !important;
	margin-right: auto !important;
	float: none !important;
}
table.center-on-narrow {
	display: inline-block !important;
}
}
</style>
    </head>
    <body width="100%" style="margin: 0;">
    <table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" style="border-collapse:collapse;">
      <tr>
        <td><center style="width: 100%;">
            
            <!-- Visually Hidden Preheader Text : BEGIN -->
            <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;"> (Optional) This text will appear in the inbox preview, but not the email body. </div>
            <!-- Visually Hidden Preheader Text : END --> 
            
            <!-- Email Header : BEGIN -->
            <table align="center" width="600" class="email-container">
            <tr>
                <td height="50" style="padding: 10px; text-align: center; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">Welcome</td>
              </tr>
          </table>
            <!-- Email Header : END --> 
            
            <!-- Email Body : BEGIN -->
            <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="600" class="email-container">
            
            <!-- Hero Image, Flush : BEGIN -->
            <tr>
                <td class="full-width-image"><img src="{{asset('images/logo.png')}}" width="600" alt="alt_text" border="0" align="center" style="width: 30%; max-width: 600px; height: auto; margin-left: 35%"></td>
              </tr>
            <!-- Hero Image, Flush : END --> 
            
            <!-- Two Even Columns : BEGIN -->
            <tr>
                <td align="center" valign="top" style="padding: 10px;"><table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                    <td class="stack-column-center" style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" ><table cellspacing="0" cellpadding="0" border="0">
                       <tr>
                        <td>Name</td>
                        <td>{{$user->fname.' '.$user->lname}}</td>
                      </tr>
                        <tr>
                        <td>Adddress</td>
                        <td>{{$user->address}}</td>
                      </tr>
                        <tr>
                        <td>Contact No. </td>
                        <td>{{$user->contact_no}}</td>
                      </tr>
                        <tr>
                        <td>Registration Date</td>
                        <td>{{$user->created_at}}</td>
                      </tr>
                        <tr>
                        <td>Date of Birth </td>
                        <td>{{$user->dob}}</td>
                      </tr>
                        <tr>
                        <td>Email Id </td>
                        <td>{{$user->email}}</td>
                      </tr>
                        <tr> </tr>
                      </table></td>
                    <td class="stack-column-center" style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" >

                      <table cellspacing="0" cellpadding="0" border="0">
                        
                        <tr>
                        <td>Name</td>
      
                        <td>{{$user->sponsor->fname.' '.$user->sponsor->lname  }}</td>
                      </tr>
                        <tr>
                        <td>Adddress</td>
                        <td>{{$user->sponsor->address}}</td>
                      </tr>
                        <tr>
                        <td>Contact No. </td>
                        <td>{{$user->sponsor->contact_no}} </td>
                      </tr>
                        <tr>
                        <td>Registration Date</td>
                        <td>{{$user->sponsor->created_at}}</td>
                      </tr>
                        <tr>
                        <td>Date of Birth </td>
                        <td>{{$user->sponsor->dob}}</td>
                      </tr>
                        <tr>
                        <td>Email Id </td>
                        <td>{{$user->sponsor->email}}</td>
                      </tr>
                        <tr> </tr>
                      </table></td>
                  </tr>
                  </table></td>
              </tr>
            <!-- Two Even Columns : END -->
            
            <tr>
                <td dir="rtl" align="center" valign="top" width="100%" style="padding: 10px;"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                    <td class="stack-column-center"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                        <td dir="ltr" valign="top" style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px; text-align: left;" class="center-on-narrow"><p> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock'. </p>
                            <br>
                            <br>
                            <br>
                            
                            <!-- Button : Begin --> 
                            
                            <!-- Button : END --></td>
                      </tr>
                      </table></td>
                  </tr>
                  </table>
				
				</td>
              </tr>
				
				
            <!-- Thumbnail Right, Text Left : END -->
            
            <tr>
                <td align="center" valign="top" style="padding: 10px;"><table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                    <td class="stack-column-center" style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" ><strong>Signatures <br>
                      of Purchasing Student</strong></td>
                    <td class="stack-column-center" style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 0 10px 10px; text-align: left;" ><table cellspacing="0" cellpadding="0" border="0">
                        <tr>
                        <td><strong>Signatures <br>
                          of Sponsor Student</strong></td>
                      </tr>
                      </table></td>
                  </tr>
                  </table></td>
              </tr>
            <tr>
                <td dir="ltr" valign="top" style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px; text-align: left;" class="center-on-narrow">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia</td>
              </tr>
				
			 <tr>
				<td style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding: 10px 10px 30px; text-align: left;" >
				 	<strong>Self-Check(Please Tick)</strong> <br> <br>

						<input type="checkbox">Draft(Name - Techlearn pvt.ltd. , Payable -Delhi, Amount - Rs 7893) <br>
						<input type="checkbox">Signature in the Invoice Printout(Your and Sponsor Student) <br>
						<input type="checkbox">Address Proof-Self attested <br>
				</td>
			    
			</tr>
			<tr>
				<td></td>	
			</tr>
          </table>
            <!-- Email Body : END --> 
            
			
            
          </center></td>
      </tr>
    </table>
</body>
</html>
