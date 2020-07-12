
<?php
  $host = "localhost"; 
  $user = "root"; 
  $password = ""; 
  $dbname = "meeting_server";

  $con = mysqli_connect($host, $user, $password,$dbname);
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }


if(isset($_POST['upload'])){

  $selectdate=$_POST['selectdate'];
  echo $selectdate;

  /*$query="INSERT INTO image(date) values('$selectdate')";
  $result=$con->query($query);
*/

 
  $name = $_FILES['file']['name'];
  $target_dir = "../../images/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $extensions_arr = array("jpg","jpeg","png","gif");

  if( in_array($imageFileType,$extensions_arr) )
  {
 
     $query = "INSERT INTO gallary(name,date1) values('$name','$selectdate')";

     mysqli_query($con,$query);
  
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

  }
  header('location:admin_gallery.php');
 
}

?>