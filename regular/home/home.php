<?php
$db = mysqli_connect('localhost','id13666527_root','Clubfriday@2020','id13666527_meeting_server');
$results = mysqli_query($db, "SELECT * FROM gallary WHERE date1=(SELECT MAX(date1) FROM gallary)");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/main2.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <link rel="stylesheet" href="demo.css">
  <link rel="stylesheet" href="footer-distributed-with-address-and-phones.css">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

  <style>
    html,
    body {
      margin: 0;
      height: 100%;
      font-family: Arial, Helvetica, sans-serif;
    }

    .navbar {
      background-color: #000 ! important;
    }

    #navbarid a {
      color: white;
    }
    .slideshow-container{
    margin-top: 2%;
}
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}
.image_slide{
    height: 400px;
    width: 600px;
}
.image{
    height: 160px;
    width: 250px;
}
.inner_div{
    display: inline-block;
    margin-right: 2%;

}
    .navbar {
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
      background-color: lightgreen;
      color: white;
    }

    .p {
      word-wrap: break-word;
    }

    * {
      box-sizing: border-box;
    }

    .carousel-inner img {
      width: 80%;
      height: 80%;
      padding-left: 20%;
      padding-bottom: 5%;
      padding-top: 5%;
    }

    .container {
      min-height: 100%;
      margin-top: 70px;
    }
        p.a{
  font-family: "MV Boli", cursive;
}

.slide_image{
   width : 1100px;
   height: 500px;
}

  </style>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid" >
      <div><img src="website/website/photos/logo.jpg" style="width: 80%;height: 60px;"></div>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarid">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarid">
        <ul class="navbar-nav text-center ml-auto">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="website/website/regular/gallery/gallery.php" class="nav-link">Gallery</a>
          </li>
          <li class="nav-item">
            <a href="website/website/regular/member_login/member_login.php" class="nav-link">Member Login</a>
          </li>
          <li class="nav-item">
            <a href="website/website/regular/contact_us/contact_us.php" class="nav-link">Contact Us</a>
          </li>
          <li class="nav-item">
            <a href="website/website/regular/about_us/about_us.php" class="nav-link">About Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="container" style="background-color: #ffd";>
  <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active"><?php $row = mysqli_fetch_array($results) ?>
        <img class="slide_image" src="<?php echo 'website/website/images/' . $row['name']; ?>" alt="Image not found" >
      </div>
      <?php
      $counter = 0;
      while ($row = mysqli_fetch_array($results)) {
        if ($counter < 2) {
      ?>
          <div class="carousel-item">
            <img class="slide_image" src="<?php echo 'website/website/images/' . $row['name']; ?>" alt="Image not found">
          </div>
      <?php $counter++;
        } else {
          break;
        }
      } ?>
    </div>

    <!-- Left and right controls -->
    <br>
  <div style="text-align:center">
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
  </div>
<p style="text-align: center">Welcome to Friday club</p>
<div class="old_image" style="text-align: center;">
<div class="inner_div">
    <p style="text-align: left;">Meeting1</p>
    <?php   $results= mysqli_query($db,"SELECT * FROM gallary g1 WHERE 2-1 = (SELECT COUNT(DISTINCT date1) FROM gallary g2 WHERE g2.date1 > g1.date1) ");
            $row = mysqli_fetch_array($results);
     ?>
      <img class="image" src="<?php echo 'website/website/images/'.$row['name'];?>" alt = "Image Not Found">
    
</div>

<div class="inner_div">
<p style="text-align: left;">Meeting2</p>
    <?php   $results= mysqli_query($db,"SELECT * FROM gallary g1 WHERE 3-1 = (SELECT COUNT(DISTINCT date1) FROM gallary g2 WHERE g2.date1 > g1.date1) ");
            $row = mysqli_fetch_array($results);
     ?>
      <img class="image" src="<?php echo 'website/website/images/'.$row['name'];?>" alt = "Image Not Found" >
    
</div>

<div class="inner_div">
<p style="text-align: left;">Meeting3</p>
    <?php   $results= mysqli_query($db,"SELECT * FROM gallary g1 WHERE 4-1 = (SELECT COUNT(DISTINCT date1) FROM gallary g2 WHERE g2.date1 > g1.date1) ");
            $row = mysqli_fetch_array($results);
     ?>
    <img class="image" src="<?php echo 'website/website/images/'.$row['name'];?>" alt = "Image Not Found" >
    
</div>


    
      

    
</div>
  </div>
</div>
  <footer class="page-footer font-small bg-dark pt-4 margin-top-4" style="margin-top:10%;">
    <div class="container-fluid text-center text-md-left text-white ">
      <div class="row text-white">

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


  </footer>
  <script>
    var slideIndex = 0;
    showSlides();
    
    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script>  

</body>

</html>