<?php
include('club_server.php');
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
  $record = mysqli_query($db, "SELECT * FROM member WHERE id=$id");

  if (@count($record) == 1) {
    $n = mysqli_fetch_array($record);
    $first_name = $n['first_name'];
    $last_name = $n['last_name'];
    $email = $n['email'];
    $mob_no = $n['mob_no'];
    $dob = $n['dob'];
    $pass_word = $n['pass_word'];
  }
}
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
    * {
      box-sizing: border-box;
    }

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
      background-color: blue;
      color: white;
    }

    .meeting_info {
      position: absolute;
      padding: 2%;
      left: 30%;
    }

    .container {
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
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarid">
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
            <a href="member.php" class="nav-link">Member</a>
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
            <a href="../setting/setting.php" class="nav-link">Setting</a>
          </li>
          <li class="nav-item">
            <a href="../logout/logout.php" class="nav-link">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <div class="container pt-4">
    <form method="post" action="club_server.php">
    <div class="form-group w-25">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
      </div>
      <div class="form-group w-25">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
      </div>
      <div class="form-group w-25">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
      </div>
      <div class="form-group w-25">
        <label for="mob_no">Mobile No</label>
        <input type="text" class="form-control" id="mob_no" name="mob_no" value="<?php echo $mob_no; ?>">
      </div>
      <div class="form-group w-25">
        <label>DOB</label>
        <input type="date" class="form-control" name="dob" name="dob" value="<?php echo $dob; ?>">
      </div>
      <input type="hidden" name="pass_word" value="<?php echo $dob; ?>">
      <div class="form-group w-25">
        <?php if ($update == true) : ?>
          <br><button class="btn" type="submit" name="update" style="background: #556B2F;">update</button>
        <?php else : ?>
          <br><button class="btn" type="submit" name="save">Save</button>
        <?php endif ?>
      </div>
        </form>
      <?php if (isset($_SESSION['message'])) : ?>
        <div class="msg">
          <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
          ?>
        </div>
      <?php endif ?>

      <?php $results = mysqli_query($db, "SELECT * FROM member"); ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>DOB</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $row = mysqli_fetch_array($results);
          while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
              <td><?php echo $row['first_name']; ?></td>
              <td><?php echo $row['last_name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['mob_no']; ?></td>
              <td><?php echo $row['dob']; ?></td>
              <td>
                <a href="member.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
              </td>
              <td>
                <a href="club_server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>


    <footer class="page-footer font-small bg-dark pt-4 margin-top-1" style="width:100%; left: 0px;bottom: 0px; ">
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

</html>