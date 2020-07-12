<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/main2.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <link rel="stylesheet" href="demo.css">
  <link rel="stylesheet" href="footer-distributed-with-address-and-phones.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">   
  <style>
* {box-sizing: border-box;}
html,body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.navbar{
      background-color: #000 ! important;
    }
    #navbarid a{
        color: white;
    }
    .navbar{
        overflow: hidden;
       background-color: black;
       padding: 1% 1%;
    }
    .navbar a {
       float: left;
       color: white;
         text-align: center;
         padding: 12px;
         text-decoration: none;
         font-size: 18px;
       line-height: 25px;
        border-radius: 4px;
    }
    .navbar a:hover {
        background-color:lightgreen;
      color: white;
    }
.meeting_info{
  position:absolute;
  padding:2%;
  left:30%;
}
.tble {
  width: 100%;
}
.form{
  padding-left: 5%;
  
}
.form1 label{
  display: inline-block;
}
.container{
  min-height: 100%;
}
    p.a{
  font-family: "MV Boli", cursive;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-black">
      <div class="container-fluid">
      <div><img src="../../photos/logo.jpg" style="width: 80%;height: 60px;"></div>
      <button class="navbar-toggler" data-toggle="collapse"data-target="#navbarid">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarid">
      <ul class="navbar-nav text-center ml-auto">
      <li class="nav-item">
						<a href="../dashboard/admin_dashboard.php" class="nav-link">Dashboard</a>
					</li>
					<li class="nav-item">
						<a href="../meeting/meeting.php" class="nav-link">Meeting</a>
					</li>
					<li class="nav-item">
						<a href="../member/member.php" class="nav-link">Member</a>
					</li>
					<li class="nav-item">
						<a href="../gallery/admin_gallery.php" class="nav-link">Gallery</a>
					</li>
					<li class="nav-item">
						<a href="../password_reset/password_reset.php" class="nav-link">Reset Password</a>
					</li>
					<li class="nav-item">
						<a href="../report/report.php" class="nav-link">Report</a>
					</li>
					<li class="nav-item">
						<a href="setting.php" class="nav-link">Setting</a>
					</li>
					<li class="nav-item">
						<a href="../logout/logout.php" class="nav-link">Logout</a>
					</li>
      </ul>
      </div>
      </div>
    </nav>
    <?php
include('setting_server.php');

  $id=1;
  $record1 = mysqli_query($db, "SELECT * FROM membership_details WHERE id=$id");
  $m= mysqli_fetch_array($record1);
  $member_fee = $m['fee'];
  $late_fee= $m['late_fee_charge'];
  $guest_charges=$m['guest_charge'];
  $lastdate=$m['last_date'];
  $payment_date=$m['payment_due'];
  $year1=$m['year'];

  while($id!=5){
    $record = mysqli_query($db, "SELECT * FROM setting WHERE id=$id");
    $n = mysqli_fetch_array($record);
    if($id==1){
       
      $president_name = $n['name'];
      $president_add = $n['address'];
      $president_contact = $n['contact'];
      }
    if($id==2){
      $secret_name = $n['name'];
      $secret_add = $n['address'];
      $secret_contact = $n['contact'];
    }
    if($id==3){
      $jsecret_name = $n['name'];
      $jsecret_add = $n['address'];
      $jsecret_contact = $n['contact'];
    }
    if($id==4){
      $treasure_name = $n['name'];
      $treasure_add = $n['address'];
      $treasure_contact = $n['contact'];
    }
    $id++;
  }
  
?>

  <div class="container pt-4">
  <form action="setting_server.php" method="post">
      <div> 
        <center><label><h3>::Master Setting::</h3></label></center>
      </div>
      <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                 <label for="meeting_code">Membership Fee:</label>
                 <input type="text" class="form-control" id="meeting_code" name="mem_fee" value="<?php echo $member_fee; ?>">
            </div>
            <div class="form-group">
                 <label for="meeting_code">Membership Late Fee:</label>
                 <input type="text" class="form-control" id="meeting_code" name="mem_late_fee" value="<?php echo $late_fee; ?>">
             </div>

        </div>
        <div class="col-sm-4">
              <div class="form-group">
                 <label for="meeting_code">Guest Dinner Charge:</label>
                 <input type="text" class="form-control" id="meeting_code" name="guest_charge" value="<?php echo $guest_charges; ?>">
             </div>
             <div class="form-group">
                 <label for="meeting_code">Last Date:</label>
                  <input type="date" class="form-control" name="dob" name="last_date" value="<?php echo $lastdate; ?>">
             </div>
           
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                 <label for="meeting_code">Payment Due Date:</label>
                  <input type="date" class="form-control" name="due_date" value="<?php echo $payment_date; ?>">
             </div>
             <div class="form-group">
                 <label for="meeting_code">Year:</label>
                 <input type="text" class="form-control" name="year" value="<?php echo $year1; ?>">
             </div>
        </div>

      </div>
  </form>
      <div class="form-group pt-1">
        <button type="submit" class="btn btn-dark" name="update2">Update</button>
      </div>

     <table class="tble">
<form class="form1" method="post" action="setting_server.php">
  <tr>
    <td style="width: 10%;"><label></label></td>
  <td>Name</td>
  <td>Address</td>
  <td>Contact Details</td>
  </tr>
  

<tr>
  <td style="width: 10%;"><label>President</label></td>
  <td><textarea rows="4" name="presi_name" style="width: 100%;"><?php echo $president_name; ?></textarea></td>
  <td><textarea rows="4" name="presi_add" style="width: 100%;"><?php echo $president_add; ?></textarea></td>
  <td><textarea rows="4" name="presi_contact" style="width: 100%;"><?php echo $president_contact; ?></textarea></td>
  </tr>

  <tr>
  <td style="width: 10%;"><label>Secretary</label></td>
  <td><textarea rows="4" name="secretary_name" style="width: 100%;"><?php echo $secret_name; ?></textarea></td>
  <td><textarea rows="4" name="secretary_add" style="width: 100%;"><?php echo $secret_add; ?></textarea></td>
  <td><textarea rows="4" name="secretary_contact" style="width: 100%;"><?php echo $secret_contact; ?></textarea></td>
  </tr>

<tr>
  <td style="width: 10%;"><label>Joint Secretary</label></td>
  <td><textarea rows="4" name="jsecretary_name" style="width: 100%;"><?php echo $jsecret_name; ?></textarea></td>
  <td><textarea rows="4" name="jsecretary_add" style="width: 100%;"><?php echo $jsecret_add; ?></textarea></td>
  <td><textarea rows="4" name="jsecretary_contact" style="width: 100%;"><?php echo $jsecret_contact; ?></textarea></td>
  </tr>
<tr>
  <td style="width: 10%;"><label>Treasurer</label></td>
  <td><textarea rows="4" name="treasurer_name" style="width: 100%;"><?php echo $treasure_name; ?></textarea></td>
  <td><textarea rows="4" name="treasurer_add" style="width: 100%;"><?php echo $treasure_add; ?></textarea></td>
  <td><textarea rows="4" name="treasurer_contact" style="width: 100%;"><?php echo $treasure_contact; ?></textarea></td>
  </tr>

<tr>
  <td><button type="submit" class="btn btn-dark mb-5"  name="update">update</button></td>
  </tr>
</form>
</table>
  </div>

<footer class="page-footer font-small bg-dark pt-4 margin-top-1" style="width:100%; left: 0px;bottom: 0px; ">
  <div class="container-fluid text-center text-md-left text-white ">
    <div class="row text-white" >
      <div class="col-md-4 mt-md-0 mt-3">
                     <h2 class="mx-2 font-italic text-warning "><p class="a">Evernet Technologies</h2></p>
 
          <p class="footer-links">
            <a href="#">Home</a>
            |
            <a href="#">About</a>
            |
            <a href="#">Contact</a>
          </p>

    <div class="footer-copyright text-left py-3 text-white" >© Copyright 2013. Evernet Technologies.
    

        <div style=" text-center" ><p>All Rights Reserved</p>
    </div>
    </div>
        </div>

        <hr class="clearfix w-100 d-md-none pb-3 ">

        <div class="col-md-4 mb-md-0 mb-3">

          <ul class="list-unstyled">
            <li>

            </li>
            <li>
              <p><i class="fa fa-map-marker"></i>
                <span> 2,Ishan Appartment</span> ,Gandhi Kunj Society<br /><span>Paldi, Ahmedabad-380007</span></p>
            </li>
            <li>
              <p><i class="fa fa-phone"></i>
                UK: +441162166224, India: 917778868367  </p>
            </li>
            <li>
              <p> <i class="fa fa-envelope"></i>
                <a href="info@evernet-tech.com">info@evernet-tech.com</a></p>
            </li>
          </ul>

        </div>

        <div class="col-md-4  mb-md-0 mb-3 ">

          <h5 class="text-uppercase">About the company</h5>
          <p> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.</p>
          <p>
          <br />
        <a href="https://twitter.com/ClubO7India" target="_blank"><img src="http://clubo7.com//wp-content/uploads/2015/07/twitter.png"></a>
    <a href="https://www.youtube.com/channel/UCoLXtWVNLwm78F98sS2tSWQ" target="_blank"><img src="http://clubo7.com/wp-content/uploads/2015/07/youtube.png" ></a>
    <a href="https://www.linkedin.com/company/club-o7" target="_blank"><img src="http://clubo7.com/wp-content/uploads/2017/01/linkdin.png" ></a>
    <a href="https://www.instagram.com/clubo7/" target="_blank"><img src="http://clubo7.com/wp-content/uploads/2017/01/instagram.png"></a>
  </p>
<br />
        </div>
      </div>
    </div>
  </div>


</footer >

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>
 