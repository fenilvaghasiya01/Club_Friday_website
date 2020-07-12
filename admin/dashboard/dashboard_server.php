<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer();
  $db = mysqli_connect('localhost', 'root', '', 'meeting_server');
  $results = mysqli_query($db, "SELECT * FROM descr");
  static $id = 0;
  
  if (isset($_POST['update'])) {
    $notice = $_POST['notice'];

    mysqli_query($db, "UPDATE descr SET notice='$notice' WHERE id='1'");
     
    header('location: admin_dashboard.php');
  }
  if (isset($_POST['final_remainder'])) {
  $results = mysqli_query($db, "SELECT email,first_name,last_name FROM member WHERE email NOT IN(SELECT email FROM member_meeting) AND member.id!=1");
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
$meeting_date=$_POST['meeting_date'];
  while($row=mysqli_fetch_array($results)){
    $name=$row['first_name'] . " ".$row['last_name'];
    $email=$row['email'];
    $mail->AddAddress("$email", "$name");
    $mail->SetFrom("clubfriday.uk@gmail.com", "fridayclub");
    $mail->Subject = "Final Remainder of the meeting organised on $meeting_date";
    $content = "<b>Name : $name</b>
    <p>This is to remaind you that your responce for the meeting organised on $meeting_date is pending</p>";
    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
        var_dump($mail);
        header('location:admin_dashboard.php');
      } else {
          header('location:admin_dashboard.php');
      }
      $mail->clearAllRecipients();

  }

  }
  
?>
