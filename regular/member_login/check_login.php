<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'meeting_server');
$results = mysqli_query($db, "SELECT email,pass_word FROM member");
if (isset($_POST['login'])) {
    $email=$_POST['email'];
$pass_word=$_POST['pass_word'];
$_SESSION["email"] = $_POST["email"];
$count=0;
$attended=0;
$row=mysqli_fetch_array($results);
if($row['email'] == $email && $attended==0){
  if($row['pass_word'] == $pass_word){
    $attended=1;
    header('location:../../admin/dashboard/admin_dashboard.php');
    }
    else{
        $attended=1;
        $_SESSION['message'] = "Password is Wrong Try Again";
        header("location:member_login.php");
    }
}

while ($row = mysqli_fetch_array($results)) {
    if( $attended==0){
        if($row['email'] == $email)
        {
            $count++;
            if($row['pass_word'] == $pass_word){
                $attended=1;
                header("location:../../member/homepage/member_home.php");
            }
            else{
                $attended=1;
                $_SESSION['message'] = "Incorrect Password";
                header("location:member_login.php");
            }
        }    
    }
}    
if($count==0 && $attended==0){
    $_SESSION['message'] = "Email id is not registered";
    header("location:member_login.php");
}
}
if (isset($_POST['save'])) {
    $email=$_SESSION['email'];
    $result1 = mysqli_query($db, "SELECT pass_word FROM member WHERE email='$email'");
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];
    while ($row = mysqli_fetch_array($result1)) {
        if($row['pass_word'] == $old_password)
        {
            if($new_password == $confirm_password){
                mysqli_query($db, "UPDATE member SET pass_word='$new_password' WHERE email='$email'");
                $_SESSION['message1'] = "Password changed succesfully";
                header("location:password_reset.php");
            }
            else{
                $_SESSION['message1'] = "Incorrect Confirm Password";
                header("location:password_reset.php");
            }
        }
        else{
            $_SESSION['message1'] = "Incorrect Old Password";
            header("location:password_reset.php");
        }  
    }
}

?>