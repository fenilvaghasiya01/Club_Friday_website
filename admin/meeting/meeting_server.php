<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'meeting_server');
	$meeting_type = "";
    $meeting_code = "";
    $dress_code = "";
    $meeting_desc = "";
    $speaker = "";
    $meeting_venue = "";
    $speaker_details = "";
    $meeting_date = "";
    $responce_date = "";
    $food_veg = "";
    $food_nonveg = "";
    $food_fish = "";
    $other_info = "";
    $upload_files = "";
    static $id = 0;
    if (isset($_POST['save'])) {
		    $meeting_type = $_POST['meeting_type'];
        $meeting_code = $_POST['meeting_code'];
        $dress_code = $_POST['dress_code'];
        $meeting_desc = $_POST['meeting_desc'];
        $speaker = $_POST['speaker'];
        $meeting_venue = $_POST['meeting_venue'];
        $speaker_details = $_POST['speaker_details'];
        $meeting_date = $_POST['meeting_date'];
        $responce_date = $_POST['responce_date'];
        $food_veg = $_POST['food_veg'];
        $food_nonveg = $_POST['food_nonveg'];
        $food_fish = $_POST['food_fish'];
        $other_info = $_POST['other_info'];
        $upload_files = $_POST['upload_files'];
        
        mysqli_query($db, "INSERT INTO meeting( meeting_type, meeting_code, dress_code, meeting_desc, speaker, meeting_venue, speaker_details ,meeting_date, responce_date, food_veg, food_nonveg, food_fish, upload_files, other_info) VALUES ('$meeting_type', '$meeting_code','$dress_code','$meeting_desc','$speaker', '$meeting_venue', '$speaker_details', '$meeting_date', '$responce_date', '$food_veg', '$food_nonveg', '$food_fish', '$upload_files', '$other_info')"); 
		header('location: meeting.php');
    }
?>