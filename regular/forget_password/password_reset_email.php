<?php
session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';
	$recipent= $_POST['email_recover'];
	$db = mysqli_connect('localhost', 'root', '', 'meeting_server');
	$results = mysqli_query($db, "SELECT email FROM member WHERE email='$recipent'");
	$row = mysqli_fetch_array($results);
	if($row == NULL){
		$_SESSION['message'] = "Enter Registered Email Id "; 
		header('location:reset.php');
	}
	else{
	$results2 = mysqli_query($db, "SELECT first_name,last_name FROM member WHERE email='$recipent'");
    $row2 = mysqli_fetch_array($results2);
    $name = $row2['first_name'] . " " . $row2['last_name'];
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Mailer = "smtp";
	$mail->SMTPDebug  = 1;  
	$mail->SMTPAuth   = TRUE;
	$mail->SMTPSecure = "tls";
	$mail->Port       = 587;
	$mail->Host       = "smtp.gmail.com";
	$mail->Username   = "clubfriday.uk@gmail.com";
	$mail->Password   = "firstproject";
	$mail->IsHTML(true);
	$mail->AddAddress("$recipent", "$name");
	$mail->SetFrom("clubfriday.uk@gmail.com", "fridayclub");
	$result = uniqid();
	mysqli_query($db, "UPDATE member SET pass_word='$result' WHERE email='$recipent'");
	$mail->Subject = "Reset Your Password";
	$content = "Your pasword from now on is : $result , change your password after Login.";
	$mail->MsgHTML($content); 
	if(!$mail->Send()) {
  	echo "Error while sending Email.";
	  var_dump($mail);
	  $_SESSION['message'] = "Problem encounterd while sending email, Please try again.";
	  header('location: reset.php');
	} else {
	  echo "Email sent successfully";
	  $_SESSION['message'] = "Check Your Email For New Password";
  	header('location: reset.php');
	}
	}
?>