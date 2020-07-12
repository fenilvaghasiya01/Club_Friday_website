<?php
error_reporting(0);
$db = mysqli_connect("localhost","root","","meeting_server");
$results1 = mysqli_query($db, "SELECT meeting_date FROM meeting");
?>
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
html,body{ 
  margin: 0;
  height: 100%;

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
						<a href="admin_gallery.php" class="nav-link">Gallery</a>
					</li>
					<li class="nav-item">
						<a href="../password_reset/password_reset.php" class="nav-link">Reset Password</a>
					</li>
					<li class="nav-item">
						<a href="../report/report.php" class="nav-link">Report</a>
					</li>
					<li class="nav-item">
						<a href="../setting/setting.php" class="nav-link">Setting</a>
					</li>
					<li class="nav-item">
						<a href="../logout/logout.php" class="nav-link">Logout</a>
					</li>
        
      </ul>
      </div>
      </div>
    </nav>

  <div class="container mx-auto mt-3">
    
   <div class="dropdown pb-4 form-group">
      <button class="btn btn-primary" type="button" data-toggle="dropdown">Select date
      <select name="selectdate"><?php while($row= mysqli_fetch_array($results1)){ ?>
		<option ><?php echo $row['meeting_date'] ?></option>
		<?php }?>
		</select>
      </button>
    </div>
    <div class="pb-4 form-group">
        <input type="file" id="upload_files" name="file"  placeholder="">
    </div>
    <div class="form-group pb-5">
     <button type="submit" class="btn btn-primary" name="upload" value="Submit">Upload</button>
    </div>
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
 