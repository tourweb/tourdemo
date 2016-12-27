<?php
include("includes/domain.php");
$admin = "shivanitak@indiator.com";
$domain ="http://indiator.com";

$Admin_phoneNo = "+ 0091 9650201036";
	$name=trim($_REQUEST['name']); 
	$email=trim($_REQUEST['email']);
	$phoneNo=trim($_REQUEST['phone']);
	$msg=trim($_REQUEST['message']);
	$msg=str_replace("\n","<br>",$msg);
	
	if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,3}$/i", $email)) {
		echo "* Please provide valid email ID"; die;
	}
	else{
	
		if((!empty($name)) && (!empty($email)) && (!empty($phoneNo))){
			
			$message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
						<html xmlns='http://www.w3.org/1999/xhtml'>
						<head>
						<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
						</head>
						<body>
						<div style='margin:auto; background:#ffffff; overflow:auto; padding:30px 0; height:auto'>
							<div style='width:600px;padding:30px 50px 40px; background-color:#BDCF97; margin:auto; overflow:auto; background-repeat:no-repeat; background-position:bottom center; color:#333'>
								<div style='padding-bottom: 5px; border-bottom: 5px solid #333;'><a href='".$domain."'><img src='".$domain."/images/logo.png'></a></div><br>
								
								<div style='float:left'>Dear Admin,<br><br>Booking Information details are as follows:</div>
								<div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Name:</strong></div><div style='float:left; width:450px; line-height:25px'>".$name."</div></div>
								<div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Email:</strong></div><div style='float:left; width:450px; line-height:25px'>".$email."</div></div>
								<div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Phone No.:</strong></div><div style='float:left; width:450px; line-height:25px'>".$phoneNo."</div></div>
								<div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Message:</strong></div><div style='float:left; width:450px; line-height:25px'>".$msg."</div>
								<div style='font-weight:bold;color:#333;font-size:15px;padding-top:10px; padding-bottom:5px;'>&nbsp;</div>
								
								<p style='border-top:1px dotted #333'>*this mail is not unsolicited. This was sent in response to one of your actions on IndiaTor.com. <br>
								*This is a one-time communication and we respect your privacy.<br>
								* Do not print this mail unless absolutely necessary.</p>
							</div>
						</div>
						</body>
						</html>";
			
			$to ='<'.$admin.'>'."\n";
			//$cc = '<info@indiator.com>'."\n";
			$subject = 'Instant Travel Assistance - IndiaTor';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: <'.$email.'>' . "\r\n";
			//$headers .= "Cc: $cc\r\n";
			
			if(@mail($to, $subject, $message, $headers)){ 
				// Mail send back to user------
				
				$to1 = '<'.$email.'>'."\n";
				$subject1 = "Instant Travel Assistance - IndiaTor";
				$message1 = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
							<html xmlns='http://www.w3.org/1999/xhtml'>
							<head>
							<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
							</head>
							<body>
							<div style='margin:auto; background:#ffffff; overflow:auto; padding:30px 0; height:auto'>
								<div style='width:600px;padding:30px 50px 40px; background-color:#BDCF97; margin:auto; overflow:auto; background-repeat:no-repeat; background-position:bottom center; color:#333'>
									<div style='padding-bottom: 5px; border-bottom: 5px solid #333;'><a href='".$domain."'><img src='".$domain."/images/logo.png'></a></div><br>
									
									<div style='float:left'>Dear ".$name.",<br><br>Thanks for contacting us. We have received your enquiry and one of our representative will get in touch with you shortly.</div>
									<div style='float:left'>Instant Travel Assistance details received as follows:</div>
									<div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Name:</strong></div><div style='float:left; width:450px; line-height:25px'>".$name."</div></div>
									<div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Email:</strong></div><div style='float:left; width:450px; line-height:25px'>".$email."</div></div>
									<div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Phone No.:</strong></div><div style='float:left; width:450px; line-height:25px'>".$phoneNo."</div></div>
									<div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Message:</strong></div><div style='float:left; width:450px; line-height:25px'>".$msg."</div>
									<div style='float:left; font-size:14px; width:100%; padding-top:10px;'>For further communication or urgent follow up please feel free to contact us</div>
					  <div style='float:left; font-size:14px; width:100%; padding-top:5px;'>Call: <strong>".$Admin_phoneNo."</strong></div>
					  <div style='float:left; font-size:14px; width:100%; padding-top:5px; padding-bottom:30px;'>Email: <strong>".$admin."</strong></div>
									<div style='font-weight:bold;color:#333;font-size:15px;padding-top:10px; padding-bottom:5px;'>&nbsp;</div>
									
									<p style='border-top:1px dotted #333'>*this mail is not unsolicited. This was sent in response to one of your actions on IndiaTor.com. <br>
									*This is a one-time communication and we respect your privacy.<br>
									* Do not print this mail unless absolutely necessary.</p>
								</div>
							</div>
							</body>
							</html>";
				
				$headers1 = "MIME-Version: 1.0" . "\r\n";
				$headers1 .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				$headers1 .= 'From:'.$admin . "\r\n";
				//$headers1 .= "Bcc: $bcc\r\n";
				if(@mail($to1, $subject1, $message1, $headers1)){ header("Location:thanks.php?stat=instant_travel");}
				else { echo("Unprecedented Error while sending mail. Please go back and try once more. Thank You for you patience.");}
			}
			else {echo("Unprecedented Error while sending mail. Please go back and try once more. Thank You for you patience.");}	
		}
		else {echo("Unprecedented Error while sending mail. Please go back and try once more. Thank You for you patience.");}
	}


?>