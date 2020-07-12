<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
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


$db = mysqli_connect('localhost', 'root', '', 'meeting_server');
$meeting_date = $_POST['meeting_date'];
$choice = $_POST['choice'];
if ($choice == 'attendance') {
  $results1 = mysqli_query($db, "SELECT meeting_code FROM meeting WHERE meeting_date='$meeting_date'");
  $row1 = mysqli_fetch_array($results1);
  $meeting_code = $row1['meeting_code'];
  $results2 = mysqli_query($db, "SELECT presence,email FROM member_meeting WHERE meeting_code='$meeting_code'");


  while ($row2 = mysqli_fetch_array($results2)) {
    $email = $row2['email'];
    $presence = $row2['presence'];
    $results3 = mysqli_query($db, "SELECT first_name,last_name FROM member WHERE email='$email'");
    $row3 = mysqli_fetch_array($results3);
    $name = $row3['first_name'] . " " . $row3['last_name'];
    $mail->AddAddress("$email", "$name");
    $mail->SetFrom("clubfriday.uk@gmail.com", "fridayclub");
    $mail->Subject = "Attendance Report";
    $content = "<b>Name : $name</b></br></br>
    <p>This is varification mail regarding your responce for the Friday Club Meeting Organized on $meeting_date , you have choosed $presence for this meeting.</p>";
    $mail->MsgHTML($content);
    if (!$mail->Send()) {
      echo "Error while sending Email.";
      var_dump($mail);
      header('location:report.php');
    } else {
      echo "Email sent successfully";
      header('location:report.php');
    }
    $mail->clearAllRecipients();
  }
}


if ($choice == 'food_choice') {
  $results1 = mysqli_query($db, "SELECT meeting_code FROM meeting WHERE meeting_date='$meeting_date'");
  $row1 = mysqli_fetch_array($results1);
  $meeting_code = $row1['meeting_code'];
  $results2 = mysqli_query($db, "SELECT food_choice,email FROM member_meeting WHERE meeting_code='$meeting_code' AND presence='true' OR presence='Present'");
  while ($row2 = mysqli_fetch_array($results2)) {
    $email = $row2['email'];
    $food_choice = $row2['food_choice'];
    $results3 = mysqli_query($db, "SELECT first_name,last_name FROM member WHERE email='$email'");
    $row3 = mysqli_fetch_array($results3);
    $name = $row3['first_name'] . " " . $row3['last_name'];
    $mail->AddAddress("$email", "$name");
    $mail->SetFrom("clubfriday.uk@gmail.com", "fridayclub");
    $mail->Subject = "Food Choice Report";
    $content = "<b>Name : $name</b></br></br>
        <p>This is varification mail regarding your responce for the Friday Club Meeting Organized on $meeting_date , you have choosed $food_choice for the meeting.</p>";
    $mail->MsgHTML($content);
    if (!$mail->Send()) {
      echo "Error while sending Email.";
      var_dump($mail);
      header('location:report.php');
    } else {
      echo "Email sent successfully";
      header('location:report.php');
    }
    $mail->clearAllRecipients();
  }
}

if ($choice == 'guest_invoice') {
  $results1 = mysqli_query($db, "SELECT meeting_code FROM meeting WHERE meeting_date='$meeting_date'");
  $row1 = mysqli_fetch_array($results1);
  $meeting_code = $row1['meeting_code'];
  $results2 = mysqli_query($db, "SELECT * FROM guest WHERE meeting_code='$meeting_code' GROUP BY email");
  while ($row2 = mysqli_fetch_array($results2)) {
    $email = $row2['email'];
    $results3 = mysqli_query($db, "SELECT * FROM guest WHERE email='$email'");
    $i = 0;
    $guest_names = array();
    $guest_food_choice = array();
    while ($row3 = mysqli_fetch_array($results3)) {
      $guest_name = $row3['first_name'] . " " . $row3['last_name'];
      $guest_names[$i] = $guest_name;
      $guest_food_choice[$i] = $row3['food_choice'];
      $i++;
    }
    $length = count($guest_names);
    $number_of_guests = $i;
    $results4 = mysqli_query($db, "SELECT first_name,last_name FROM member WHERE email='$email'");
    $row4 = mysqli_fetch_array($results4);
    $name = $row4['first_name'] . " " . $row4['last_name'];
    $mail->AddAddress("$email", "$name");
    $mail->SetFrom("clubfriday.uk@gmail.com", "fridayclub");
    $mail->Subject = "Guest Invoice Report";
    $j = 0;
    $results5 = mysqli_query($db, "SELECT guest_charge FROM membership_details");
    $row5 = mysqli_fetch_array($results5);
    $guest_charge = $row5['guest_charge'];
    $total_ammount = $guest_charge * $i;
    $content = "<b>Name : $name</b></br></br>
                        <table border=\"1\">
                        <tr>
                        <th>Guest Name</th>
                        <th>Food Choice</th>
                        <th>Guest Charge</th>
                        </tr>
                        ";

    while ($j < $length) {
      $content .= "<tr>
                        <td>$guest_names[$j]</td>
                        <td>$guest_food_choice[$j]</td>
                        <td>$guest_charge</td>
                        </tr>";
      $j++;
    }
    $content .= "<tr>
    <td colspan=\"2\"><center>Total Charge</center></td>
    <td>$total_ammount</td>
    </tr>";
    $mail->MsgHTML($content);
    if (!$mail->Send()) {
      echo "Error while sending Email.";
      var_dump($mail);
      header('location:report.php');
    } else {
      echo "Email sent successfully";
      header('location:report.php');
    }
    $mail->clearAllRecipients();
  }
}

if ($choice == 'membership_invoice') {

  $results1 = mysqli_query($db, "SELECT email FROM member");
  while ($row1 = mysqli_fetch_array($results1)) {
    $email = $row1['email'];
    $results2 = mysqli_query($db, "SELECT first_name,last_name FROM member WHERE email='$email'");
    $row2 = mysqli_fetch_array($results2);
    $name = $row2['first_name'] . " " . $row2['last_name'];
    $results3 = mysqli_query($db, "SELECT fee,last_date FROM membership_details");
    $row3 = mysqli_fetch_array($results3);
    $fee = $row3['fee'];
    $last_date = $row3['last_date'];
    $mail->AddAddress("$email", "$name");
    $mail->SetFrom("clubfriday.uk@gmail.com", "fridayclub");
    $mail->Subject = "Membership Invoice Report";
    $content = "<b>Name : $name</b></br></br>
    <p>This mail is regarding your yearly membership charge for the Friday Club.</p></br>
    <p>Amount to be paid for the membership is $fee , on or before $last_date.</p>
    <p>If you have paid the membership charge then ignore this mail.</p>";
    $mail->MsgHTML($content);
    if (!$mail->Send()) {
      echo "Error while sending Email.";
      var_dump($mail);
      header('location:report.php');
    } else {
      echo "Email sent successfully";
      header('location:report.php');
    }
    $mail->clearAllRecipients();
  }
}
?>