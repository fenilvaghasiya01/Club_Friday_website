<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
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
        background-color:blue;
      color: white;
    }
.p{
    word-wrap:break-word;
}
* {
  box-sizing: border-box;
}
.container{
  min-height: 100%;
}
.div1{
  display: inline-block;
  width: 100%;
  padding-top: 2%;
  padding-left: 2%;
}
.image{
  height:150px;
  width:225px;
}
.div{
    display:inline-block;
    margin-left:10%;
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
          <a href="../../../../index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="gallery.php" class="nav-link">Gallery</a>
        </li>
        <li class="nav-item">
          <a href="../member_login/member_login.php" class="nav-link">Member Login</a>
        </li>
        <li class="nav-item">
          <a href="../contact_us/contact_us.html" class="nav-link">Contact Us</a>
        </li>
        <li class="nav-item">
          <a href="../about_us/about_us.html" class="nav-link">About Us</a>
        </li>
      </ul>
      </div>
      </div>
    </nav>
  
 
 <div class="container">
 <?php
$db = mysqli_connect('localhost','id13666527_root','Clubfriday@2020','id13666527_meeting_server');
$date1 = $_POST['date1'];
$meeting= mysqli_query($db, "SELECT * FROM meeting WHERE CAST(meeting_date AS DATE)='$date1'");
$row_meeting=mysqli_fetch_array($meeting);
$gallary=mysqli_query($db, "SELECT * FROM gallary WHERE date1='$date1'");
$gallary1 =mysqli_query($db,"SELECT * FROM gallary GROUP BY date1 ");
?>
<div class="container-fluid">
 
   <div class="container">
  <table class="table table-bordered mt-5 w-50 mx-auto" >
    <tbody>
      <tr>
      <td><span id="print_meeting">Meeting Code</span>:<?php echo $row_meeting['meeting_code']; ?></td>
      <td><span id="print_meeting">Meeting Type</span>:<?php echo $row_meeting['meeting_type']; ?></td>
      <td><span id="print_meeting">Meeting Venue</span>:<?php echo $row_meeting['meeting_venue']; ?></td>        
      </tr>
      <tr>
        <td><span id="print_meeting">Meeting Description</span>:<?php echo $row_meeting['meeting_desc']; ?></td>    
        <td><span id="print_meeting">Speaker</span>:<?php echo $row_meeting['speaker']; ?></td>
        <td><span id="print_meeting">Speaker Details</span>:<?php echo $row_meeting['speaker_details']; ?></td>
      </tr>
    </tbody>
  </table>

    </div>
    </div>
    <div class="div1">
<?php  while ($extra = mysqli_fetch_array($gallary1)) {
      $counter=0;
      ?>
      <tr>
    <?php
    while($counter<3 ){
    $row_gallary = mysqli_fetch_array($gallary);
    if($row_gallary == NULL){
    break;
    }
    ?>
    <td>
    <div class="div">
      <img class="image" src="<?php echo '../../images/'.$row_gallary['name'];?>" alt="image"><br>
    </div>  
    </td>
    <?php 
    $counter++;
  } ?>
  </tr><br><br><br><br>
    <?php } ?>
</div>
</div>
 <footer class="page-footer font-small bg-dark pt-4 margin-top-4" style="margin-top:10%;">
  <div class="container-fluid text-center text-md-left text-white ">
    <div class="row text-white" >

      <div class="col-md-4 mt-md-0 mt-3">
        <img src="logo.jpg">
       <p class="footer-links">
          <a href="#">Home</a>
          ·
          <a href="#">Blog</a>
          ·
          <a href="#">Pricing</a>
          ·
          <a href="#">About</a>
          ·
          <a href="#">Faq</a>
          ·
          <a href="#">Contact</a>
        </p>
        <p class="footer-company-name">Company Name &copy; 2015</p>
      </div>

      <hr class="clearfix w-100 d-md-none pb-3 ">

      <div class="col-md-4 mb-md-0 mb-3">

        <ul class="list-unstyled" >
          <li>
           
          </li>
          <li>  
           <p><i class="fa fa-map-marker"></i>
            <span>21 Revolution Street</span> Paris, France</p>
          </li>
          <li>
              <p><i class="fa fa-phone"></i>
              +1 555 123456</p>
          </li>
          <li>
              <p>  <i class="fa fa-envelope"></i>
               <a href="mailto:support@company.com">support@company.com</a></p>
          </li>
        </ul>

      </div>
 
      <div class="col-md-4  mb-md-0 mb-3 ">

        <h5 class="text-uppercase">About the company</h5>
        <p> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.</p>
        <div class="footer-icons" >

          <a href="#"><i class="fa fa-facebook"style="padding-right: 8px;"></i></a>
          <a href="#"><i class="fa fa-twitter" style="padding-right: 8px;"></i></a>
          <a href="#"><i class="fa fa-linkedin" style="padding-right: 8px;"></i></a>
          <a href="#"><i class="fa fa-github" style="padding-right: 8px;"></i></a>

        </div>
      
      </div>

    </div>

  </div>

  <div class="footer-copyright text-center py-3 text-white ">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>

</footer >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
