<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'meeting_server');
	$first_name = "";
    $last_name = "";
    $email = "";
    $mob_no = "";
    $dob = "";
    $pass_word = "";
	static $id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $mob_no = $_POST['mob_no'];
        $dob = $_POST['dob'];
        $pass_word = $_POST['dob'];
        
		mysqli_query($db, "INSERT INTO member ( first_name, last_name, email, mob_no, dob, pass_word) VALUES ('$first_name', '$last_name','$email','$mob_no','$dob','$pass_word')");
        
        $_SESSION['message'] = "Information saved!";
       
		header('location: member.php');
	}
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $mob_no = $_POST['mob_no'];
        $dob = $_POST['dob'];
        $pass_word = $_POST['pass_word'];

		mysqli_query($db, "UPDATE member SET first_name='$first_name', last_name='$last_name', email='$email', mob_no='$mob_no', dob='$dob', pass_word='$pass_word' WHERE id=$id");
		$_SESSION['message'] = "Information updated!"; 
		header('location: member.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM member WHERE id=$id");
	$_SESSION['message'] = "Information deleted!"; 
	header('location: member.php');
}
	$results = mysqli_query($db, "SELECT * FROM member");
?>