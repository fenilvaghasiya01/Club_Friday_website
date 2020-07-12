<?php
$db = mysqli_connect('localhost','root','','meeting_server');
$results= mysqli_query($db,"SELECT * FROM gallary WHERE date1=(SELECT MAX(date1) FROM gallary)");
?>
<!DOCTYPE html>
<html>
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="1/ninja-slider.css" rel="stylesheet" type="text/css" />
    <script src="1/ninja-slider.js" type="text/javascript"></script>
<style>

    
* {box-sizing: border-box;}
body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;

}
ul li {padding: 10px 0;}
.header {
  overflow: hidden;
  background-color: black;
  padding: 1% 1%;
}
.header a {
  float: left;
  color: white;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}
.header img {
  font-size: 25px;
  font-weight: bold;
}
.header a:hover {
  background-color: lightblue;
  color: white;
}

.header-right {
  float: right;
}
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  } 
@media screen and (max_width:500px){
  .header.img{
    float: none;
    display: block;
  }
  

}
  .header-right {
    float: none;
  }
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

}
</style>
</head>
<body>

<div class="header" >
  <img src="../../photos/logo.jpg" width="90px" height="50px">
  <div class="header-right">
    <a class="active" href="home.php">Home</a>
    <a href="../gallery/gallery.php">Gallery</a>
    <a href="../member_login/member_login.php">Member Login</a>
    <a href="../contact_us/contactus.htm">Contact Us</a>
    <a href="../about_us/about_us.html">About Us</a>
  </div>
</div>
    <div id="ninja-slider">
        <div class="slider-inner">

<?php
$counter=0;
while ($row = mysqli_fetch_array($results)) {
    if ($counter < 3){
    ?>

    <img class="image_slide" src="<?php echo '../../images/'.$row['name'];?>" >
  </div>
    <?php $counter++; }
  else {
  break;}} ?>



  
</div>
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
      <img class="image" src="<?php echo '../../images/'.$row['name'];?>" alt = "Image Not Found">
    
</div>

<div class="inner_div">
<p style="text-align: left;">Meeting2</p>
    <?php   $results= mysqli_query($db,"SELECT * FROM gallary g1 WHERE 3-1 = (SELECT COUNT(DISTINCT date1) FROM gallary g2 WHERE g2.date1 > g1.date1) ");
            $row = mysqli_fetch_array($results);
     ?>
      <img class="image" src="<?php echo '../../images/'.$row['name'];?>" alt = "Image Not Found" >
    
</div>

<div class="inner_div">
<p style="text-align: left;">Meeting3</p>
    <?php   $results= mysqli_query($db,"SELECT * FROM gallary g1 WHERE 4-1 = (SELECT COUNT(DISTINCT date1) FROM gallary g2 WHERE g2.date1 > g1.date1) ");
            $row = mysqli_fetch_array($results);
     ?>
    <img class="image" src="<?php echo '../../images/'.$row['name'];?>" alt = "Image Not Found" >
    
</div>


    
      

    
</div>
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