<?php
if($_POST)
{ 
	 
 
/*	$user_name      = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $user_email     = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $user_company     = filter_var($_POST["company"], FILTER_SANITIZE_STRING);
    $content   = filter_var($_POST["content"], FILTER_SANITIZE_STRING);
*/	 
   $user_name = $_POST['name'];
   $user_email = $_POST['email'];
   $user_company = $_POST['company'];
   $content = $_POST['content'];
  
    if(empty($user_name)) {
		$empty[] = "<b>Name</b>";		
	}
	if(empty($user_email)) {
		$empty[] = "<b>Email</b>";
	}
//	if(empty($user_company)) {
//		$empty[] = "<b>company Number</b>";
//	}	
	if(empty($content)) {
		$empty[] = "<b>Message</b>";
	}
	
	if(!empty($empty)) {
		$output = json_encode(array('type'=>'error', 'text' => implode(", ",$empty) . ' Required!'));
        die($output);
	}
	
	if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
	    $output = json_encode(array('type'=>'error', 'text' => '<b>'.$user_email.'</b> is an invalid Email, please correct it.'));
		die($output);
	}
 
		$toEmail = "support@collectsmart.com";
    $subjectName = "Comsoft";

	$mailHeaders = "MIME-Version: 1.0" . "\r\n";
    $mailHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$mailHeaders .= "From: " . $subjectName . "<" . $user_email . ">\r\n";

	$bodyH = '<!DOCTYPE html>
	<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="x-apple-disable-message-reformatting">
		<title></title>
		</head><body style="margin:0;padding:0;">
		<table role="presentation" style="width:602px;border-collapse:collapse;border:0px solid #cccccc;border-spacing:0;text-align:left;">
		<tr><td align="center" style="padding:40px 0 30px 0;">
		<table bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="600" id="emailBody">
		<tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#03223d"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer"><tr><td align="center" valign="top" width="600" class="flexibleContainerCell"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td align="left" valign="middle" class="textContent"><div style="white-space: nowrap;max-width: 100%;"><div style="height: 80px; background-color: #76AFD5; width: 250px; display: inline-block;text-align: left;vertical-align: top;margin: 0 0%;white-space: normal;"><img src="https://www.comsoft.com.sg/app005/assets/images/collectsmartlogor1-550x197.png" alt="Comsoft" title="Comsoft" style="height: 75px !important; padding: 0.2rem 0.5rem;" /></div><div  style="height: 80px; background-color: #76AFD5; width: 10px; margin-left: 9px !important;display: inline-block;text-align: left;vertical-align: top;margin: 0 0%;white-space: normal;"></div>
		<div style="display: inline-block;text-align: right;vertical-align: top;margin: 0 0%;white-space: normal;"></div></div></td></tr></table></td></tr></table></td></tr></table>';
		$bodyH1 ='<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer"><tr><td align="center" valign="top" width="600" class="flexibleContainerCell"> <table border="0" cellpadding="30" cellspacing="0" width="100%"><tr><td align="center" valign="top"><br><div align="left">  <span style="font-family:\'Faktum Test\',Arial,sans-serif; font-size:12px; font-weight: bold; color: #5F5F5F;">Dear Comsoft Support Team,<br><br><br>Enquiry from website
		<table>
		<tr><td>Name  </td><td>: '.$user_name.'</td></tr>
		<tr><td>company </td><td>: '.$user_company.'</td></tr>
		<tr><td>Email</td><td>: '.$user_email.'</td></tr>
		<tr><td>DateTime </td><td>: '. date("d-m-Y") ." ". date("H:i:s").'</td></tr>
		<tr><td>Message </td><td>: '.$content.'</td></tr>
		</table> 
		<br><br>Yours faithfully<br>'.$user_name.'</span> </div></td></tr></table></td> </tr> </table> </td></tr> </table> </td> </tr>
		<tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer"><tr><td align="center" valign="top" width="600" class="flexibleContainerCell"><table class="flexibleContainerCellDivider" border="0" cellpadding="30" cellspacing="0" width="100%"><tr><td align="center" valign="top" style="padding-top:0px; padding-bottom:0px;"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td align="center" valign="top">&nbsp;</td></tr><tr><td align="center" valign="top" style="border-top:1px solid #C8C8C8;"></td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer"><tr><td align="center" valign="top" width="600" class="flexibleContainerCell"><table border="0" cellpadding="30" cellspacing="0" width="100%"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td valign="top" class="textContent"> <div style="text-align:justify;font-family:\'FaktumTest\',Arial,sans-serif;font-size:12px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;"><br><b>If you are not the intended recipient, please ignore and delete this email immediately.</b><br><br><b>This is an automatically generated message. Please do not reply to this email.</b></div></td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table><table bgcolor="#488D9C" border="0" cellpadding="0" cellspacing="0" width="600" id="emailFooter"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer"><tr><td align="center" valign="top" width="600" class="flexibleContainerCell"><table border="0" cellpadding="30" cellspacing="0" width="100%"><tr><td valign="top" bgcolor="#03223d"><div>
		<a style="font-family:\'Faktum Test\',Arial,sans-serif;font-size:11px;color:#000000 !important;text-align:left;line-height:120%;" href="&&serverUrl&&"></a></div>	</td></tr></table></td></tr></table></td></tr></table></td></tr></table><table bgcolor="#E1E1E1" border="0" cellpadding="0" cellspacing="0" width="600" id="emailFooter"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer"><tr><td align="center" valign="top" width="600" class="flexibleContainerCell"><table border="0" cellpadding="30" cellspacing="0" width="100%"><tr><td valign="top" bgcolor="#E1E1E1"><div style="font-family:\'Faktum Test\',Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;"><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div></td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table></body></html>';
	  
	 //  error_log("Body=> ". $bodyH1);
	if(mail($toEmail, "Enquiry from Comsoft Website",$bodyH.$bodyH1, $mailHeaders)){
		$output = json_encode(array('type'=>'message', 'text' => 'Thank you for the message. We will get back to you.'));
	   	die($output);
	} else {
	    $output = json_encode(array('type'=>'error', 'text' => 'Unable to send email, please contact'));
	    die($output);
	}
}
