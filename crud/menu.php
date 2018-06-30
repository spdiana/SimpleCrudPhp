<?php
session_start();
    include_once 'user/user_db.php';
    $user = new User();
    $username = $_SESSION['username'];
		$fullname = $_SESSION['fullname'];


    if (!$user->get_session()){
       header("location:index.php");
    }
    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:index.php");
    }
?>

<html>
<head>
    <title>Menu</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<div class="container">
  <div style="height:50px;"></div>
  <div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:70%;">
    Menu
    <span class="pull-right"> User: <?php echo $fullname  ?> <a href="home.php?q=logout">LOGOUT</a></span>
  </div>
</div>

</html>
