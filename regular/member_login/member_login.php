<?php
session_start();
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

 <nav class="navbar navbar-expand-lg navbar-dark bg-black">
      <div class="container-fluid">
      <div><img src="../../photos/logo.jpg" style="width: 80%;height: 60px;"></div>
      <button class="navbar-toggler" data-toggle="collapse"data-target="#navbarid">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarid">
      <ul class="navbar-nav text-center ml-auto">
        <li class="nav-item">
          <a href="../home/home.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="../gallery/gallery.php" class="nav-link">Gallery</a>
        </li>
        <li class="nav-item">
          <a href="member_login.php" class="nav-link">Member Login</a>
        </li>
        <li class="nav-item">
          <a href="../contact_us/contact_us.php" class="nav-link">Contact Us</a>
        </li>
        <li class="nav-item">
          <a href="../about_us/about_us.php" class="nav-link">About Us</a>
        </li>
      </ul>
      </div>
      </div>
    </nav>
<div class="container" style="padding:5%;">
<form class="login_page" method="POST" action="check_login.php">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
              <div class="form-label-group">
                <input type="email" id="inputEmail"name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword"  name="pass_word" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <div>
                <?php if (isset($_SESSION['message'])):
                    echo "<p style='color:red;'>" . $_SESSION['message'] . "</p>"; 
                    unset($_SESSION['message']);
                endif ?>
                </div>

              <button class="btn btn-lg btn-primary mb-3 btn-block text-uppercase" type="submit" name="login">Sign in</button>
              <center><a href="../forget_password/reset.php">Forgot Password</a></center>
          </div>
        </div>
      </div>
    </div>
    </form>
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
