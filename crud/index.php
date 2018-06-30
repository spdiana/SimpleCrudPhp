<?php
session_start();
include_once 'user/user_db.php';
$user = new User();
if (isset($_POST['submit'])) {
		extract($_POST);
	    $login = $user->isLoginExist($emailusername, $password);
	    if ($login) {
	        // Registration Success
		header("location:events_list.php");
	    } else {
	        // Registration Failed
	        echo 'Wrong username or password';
	    }
	}
?>

<html>
   <head>
      <title>Login Page</title>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


      <script>
      function submitlogin() {
        var form = document.index;
        if (form.emailusername.value == "") {
          alert("Enter email or username.");
          return false;
        } else if (form.password.value == "") {
          alert("Enter password.");
          return false;
        }
      }
      </script>
   </head>

   <body bgcolor = "#FFFFFF">
		 <div class="container">
		 	<div style="height:50px;"></div>
		 	<div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:30%;">

		 		<span style="font-size:25px; color:blue"><strong>Login</strong></span>

		 		<div style="height:15px;"></div>
				<div style = "margin:30px">
					 <form action = "" method = "post">
							<label>UserName  :</label><input type = "text" name="emailusername" class = "box" required/><br /><br />
							<label>Password  :</label><input type = "password" name="password" class = "box" required/><br/><br />
							<input type="submit" name="submit" value="Login" onclick="return(submitlogin());"/><br />
					 </form>
					 <div style = "font-size:11px; color:#cc0000; margin-top:10px"><a href="new_user.php">Register new user</a> </div>
				</div>
   </body>
</html>
