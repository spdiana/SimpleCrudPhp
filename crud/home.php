<?php
session_start();
    include_once 'user/user_db.php';
    $user = new User();
    $username = $_SESSION['username'];

    if (!$user->get_session()){
       header("location:index.php");
    }
    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:index.php");
    }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  </head>

  <body>
    <div id="container" class="container">
      <div id="header">
        <a href="home.php?q=logout">LOGOUT</a>
      </div>
      <div id="main-body">
        <br/>
        <br/>
        <br/>
        <br/>
        <h1>
                  Hello <?php $user->get_fullname($username); ?>
    			</h1>
      </div>
      <div id="footer"></div>
    </div>
  </body>

  </html>
