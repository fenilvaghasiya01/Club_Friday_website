<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'meeting_server');
$meeting_code = $_POST['meeting_code'];
$email = $_SESSION['email'];
$_SESSION['meeting_code'] = $_POST['meeting_code'];
static $id = 0;
?>
<?php if (isset($_POST['no'])) {
    $presence = 'Absent';
    $email = $_SESSION['email'];
    mysqli_query($db, "INSERT INTO member_meeting(email,presence,meeting_code) VALUES ('$email','$presence','$meeting_code')");
    header('location: memberside_meeting.php');
}?>

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
  <style type="text/css">
    html,body {
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
.p{
    word-wrap:break-word;
}
.container{
  min-height: 100%;
}

* {
  box-sizing: border-box;
}
:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;

  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}
    p.a{
  font-family: "MV Boli", cursive;
}

@media all and (-ms-high-contrast: none),
(-ms-high-contrast: active) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-black mb-3">
      <div class="container-fluid">
      <div><img src="../../photos/logo.jpg" style="width: 80%;height: 60px;"></div>
      <button class="navbar-toggler" data-toggle="collapse"data-target="#navbarid">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarid">
      <ul class="navbar-nav text-center ml-auto">
      <li class="nav-item">
          <a href="../home/member_home.php" class="nav-link">Notice</a>
        </li>
        <li class="nav-item">
          <a href="memberside_meeting.php" class="nav-link">Meeting</a>
        </li>
        <li class="nav-item">
          <a href="../password_reset/password_reset.php" class="nav-link">Password Reset</a>
        </li>
        <li class="nav-item">
          <a href="../logout/logout.php" class="nav-link">Logout</a>
        </li>    
      </ul>
      </div>
      </div>
    </nav>
<?php 
$results = mysqli_query($db, "SELECT * FROM meeting where meeting_code=$meeting_code"); 
$row = mysqli_fetch_array($results);
?>
<form action="guest_fillup.php" method="post">
<div class="container">
  <h2><center><label for="meeting_details">::Fill Up Meeting Details::</label></center></h2>
    <div class="form-group">
        <label for="meeting_desc">Meeting description:</label>
         <label for="meeting_desc"><?php echo $row['meeting_desc']; ?></label>
      </div>
      <div class="form-group">
        <label for="meeting_date">Meeting Date:</label>
         <label for="meeeting_date"><?php echo $row['meeting_date']; ?></label>
      </div>
      <div class="form-group">
        <label for="meeting_venue">Meeting venue:</label>
         <label for="meeting_venue"><?php echo $row['meeting_venue']; ?></label>
      </div>

      <h2><center><label for="meeting_details">::Menu Details::</label></center></h2>
       <div class="form-group">
        <label for="responce_date">Veg:</label>
         <label for="responce_date"><?php echo $row['food_veg']; ?></label>
      </div>
       <div class="form-group">
        <label for="responce_date">Non-Veg:</label>
         <label for="responce_date"><?php echo $row['food_nonveg']; ?></label>
      </div>
       <div class="form-group">
        <label for="responce_date">Fish:</label>
         <label for="responce_date"><?php echo $row['food_fish']; ?></label>
      </div>
      <div class="form-group">
        <label for="responce_date">Food Choice:</label>
       <label><input type="radio" name="food_choice" style="margin-left: 15px;" value="Veg" checked>Veg</label>
   
     <label><input type="radio" name="food_choice" style="margin-left: 15px;" value="Non Veg">Non-Veg</label>
 
    <label><input type="radio" name="food_choice" style="margin-left: 15px;" value="Fish">Fish</label>
    </div>
   <div class="form-group">
        <label for="responce_date">Do you have guest..?:</label>
        <input type="hidden" name="presence" value="Present">
         <button type="submit" class="btn btn-dark" name="yes" value="yes">yes</button>
         <button type="submit" class="btn btn-dark" name="no" value="no">No</button>
      </div>
      </div>
</div>
</form>
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
