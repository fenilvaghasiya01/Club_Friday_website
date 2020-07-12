<?php 
	$db = mysqli_connect('localhost', 'root', '', 'meeting_server');
	$first_name = "";
    $last_name = "";
	$food_choice="";
	$meeting_code=$_SESSION['meeting_code'];
	$email = $_SESSION['email'];
    static $id = 0;
	$update = false;

	if (isset($_POST['add_guest'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$food_choice = $_POST['food_choice'];
        mysqli_query($db, "INSERT INTO guest ( first_name, last_name, email, food_choice,meeting_code) VALUES ('$first_name', '$last_name','$email','$food_choice','$meeting_code')");
		$_SESSION['message'] = "Information saved"; 
		header('location: guest_fillup.php');
    }
    if (isset($_POST['submit'])) {
		header('location: memberside_meeting.php');
	}
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$email = $_POST['email'];
		$first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $food_choice = $_POST['food_choice'];

		mysqli_query($db, "UPDATE guest SET first_name='$first_name', last_name='$last_name', email='$email', food_choice='$food_choice' WHERE id=$id");
		$_SESSION['message'] = "Information updated!"; 
		header('location: guest_fillup.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM guest WHERE id=$id");
	$_SESSION['message'] = "Information deleted!"; 
	header('location: guest_fillup.php');
}
	$results = mysqli_query($db, "SELECT * FROM guest");
?>