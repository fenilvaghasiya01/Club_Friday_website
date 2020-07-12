<?php
session_start();
session_destroy();
header('Location:../../regular/home/home.php');
?>