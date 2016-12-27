<?php
if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	

	if (!empty($name) && !empty($email) && !empty($message)) {
		require 'phpmailer/PHPMailerAutoload.php';
		require_once('phpmailer/class.phpmailer.php');

		$mail = new PHPMailer();

		$mail->isSMTP();                            // Set mailer to use SMTP
		//$mail->SMTPDebug = 2;
		$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                     // Enable SMTP authentication
		$mail->Username = 'shivanitak157@gmail.com';          // SMTP username
		$mail->Password = 'shivani157'; // SMTP password
		$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                          // TCP port to connect to

		$mail->setFrom('info@indiator.com', 'Indiator');

		$mail->addAddress('jasbir@indiator.com');   // Add a recipient
		$mail->addReplyTo($email, $name);

		$mail->isHTML(true);  // Set email format to HTML

		$bodyContent = "<h1>New Message From $name <$email></h1>";
		$bodyContent .= "<p>You have received a new message</p>";
		$bodyContent .= "<p>Name: $name<br>Email: $email<br>Phone: $phone<br>Subject: $subject<br>Message: $message</p>";

		$mail->Subject = "New Message From $name <$email>";
		$mail->Body    = $bodyContent;

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    //echo 'Message has been sent';
		    ?>

		    <script>
		    	 alert("Thanks for connecting with Indiator. We will get back to you shortly.");
		    </script>

		    <?php
		}
	}
	else {
		echo "Please fill all the required fields";
	}
}
?>