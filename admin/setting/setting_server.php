<?php 
/*
create table setting(
id int(2) NOT NULL auto_increement PRIMARY KEY,
name varchar(20),
address varchar(30),
contact int(15)
);

CREATE TABLE membership_details(
id int(2) NOT NULL AUTO_INCREEMENT PRIMARY KEY,
fee int(10) NOT NULL,
late_fee_charge int(10) NOT NULL,
guest_charge int(10) NOT NULL,
last_date date NOT NULL,
payment_due date NOT NULL,
year year(4)
);
the following are default values of table membership_details.
INSERT INTO `membership_details` (`fee`, `late_fee_charge`, `guest_charge`, `last_date`, `payment_due`, `year`) VALUES ('1000', '100', '10000', '2020-04-30', '2020-04-30 23:59:59', '2020');
*/
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'meeting_server');
	$president_name = " ";
    $secret_name = " ";
    $jsecret_name = " ";
    $treasure_name = " ";
    $president_add = " ";
    $secret_add = " ";
    $jsecret_add = " ";
    $treasure_add = " ";
    $president_contact = " ";
    $secret_contact = " ";
    $jsecret_contact = " ";
    $treasure_contact = " ";
    $member_fee = " ";
    $guest_charges = " ";
    $payment_date= "";
    $late_fee = "";
    $lastdate = "";
    $year1 = ""; 
	static $id = 0;
	

	/*if (isset($_POST['submit'])) {
		$president_name = $_POST['presi_name'];
   		$secret_name = $_POST['secretary_name'];
	    $jsecret_name = $_POST['jsecretary_name'];
    	$treasure_name = $_POST['treasurer_name'];
    	$president_add = $_POST['presi_add'];
	    $secret_add = $_POST['secretary_add'];
    	$jsecret_add = $_POST['jsecretary_add'];
	    $treasure_add = $_POST['treasurer_add'];
    	$president_contact = $_POST['presi_contact'];
	    $secret_contact = $_POST['secretary_contact'];
    	$jsecret_contact = $_POST['jsecretary_contact'];
    	$treasure_contact = $_POST['treasurer_contact'];
        
		
	mysqli_query($db, "INSERT INTO setting ( name, address, contact) VALUES ('$president_name', '$president_add','$president_contact')");
	mysqli_query($db, "INSERT INTO setting ( name, address, contact) VALUES ('$secret_name', '$secret_add','$secret_contact')");
	mysqli_query($db, "INSERT INTO setting ( name, address, contact) VALUES ('$jsecret_name', '$jsecret_add','$jsecret_contact')");
	mysqli_query($db, "INSERT INTO setting ( name, address, contact) VALUES ('$treasure_name', '$treasure_add','$treasure_contact')");

	$_SESSION['message'] = "Information saved"; 
	header('location: setting.php');
	}*/

    if (isset($_POST['update2'])) {
		$id = 1;
		$member_fee = $_POST['mem_fee'];
   		$late_fee = $_POST['mem_late_fee'];
	    $guest_charges = $_POST['guest_charge'];
    	$lastdate = $_POST['last_date'];
    	$payment_date = $_POST['due_date'];
	    $year1 = $_POST['year'];
    	
		mysqli_query($db, "UPDATE membership_details SET fee='$member_fee', late_fee_charge='$late_fee', guest_charge='$guest_charges', last_date='$lastdate', payment_due='$payment_date', year='$year1' WHERE id='$id'");
		$_SESSION['message'] = "Information saved"; 
	header('location: setting.php');
	}

	if (isset($_POST['update'])) {
		$id = 1;
		$president_name = $_POST['presi_name'];
   		$secret_name = $_POST['secretary_name'];
	    $jsecret_name = $_POST['jsecretary_name'];
    	$treasure_name = $_POST['treasurer_name'];
    	$president_add = $_POST['presi_add'];
	    $secret_add = $_POST['secretary_add'];
    	$jsecret_add = $_POST['jsecretary_add'];
	    $treasure_add = $_POST['treasurer_add'];
    	$president_contact = $_POST['presi_contact'];
	    $secret_contact = $_POST['secretary_contact'];
    	$jsecret_contact = $_POST['jsecretary_contact'];
    	$treasure_contact = $_POST['treasurer_contact'];

		mysqli_query($db, "UPDATE setting SET name='$president_name', address='$president_add', contact='$president_contact' WHERE id=$id");
		++$id;
		mysqli_query($db, "UPDATE setting SET name='$secret_name', address='$secret_add', contact='$secret_contact' WHERE id=$id");
		++$id;
		mysqli_query($db, "UPDATE setting SET name='$jsecret_name', address='$jsecret_add', contact='$jsecret_contact' WHERE id=$id");
		++$id;
		mysqli_query($db, "UPDATE setting SET name='$treasure_name', address='$treasure_add', contact='$treasure_contact' WHERE id=$id");
		++$id;
		$_SESSION['message'] = "Information updated!"; 
		header('location: setting.php');
	}

?>