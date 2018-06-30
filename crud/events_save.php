<?php

include_once 'upload_image/upload_image.php';
include_once 'events/events_db.php';
$events = new Events();
$imageLoader = new ImageLoader();

if (isset($_POST['submit'])){
        extract($_POST);

        $foto = $_FILES["fileimage"];

        $resultFileUpLoad = $imageLoader-> saveImageFile("images/", $foto);
        echo $resultFileUpLoad;
        $resultSaveEvents = $events-> insertEvent($titulo,$endereco,$horario,$data,$site,$resultFileUpLoad);
        //echo $resultSaveEvents;
}
?>

<html>
   <head>
      <title>Login Page</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>

   <body bgcolor = "#FFFFFF">
     <?php
   		include "menu.php";
   	?>

		 <div class="container">
		 	<div style="height:50px;"></div>
		 	<div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:60%;">

        <span class="pull-right"><a href="events_list.php"  class="btn btn-primary">
  				<span class="glyphicon glyphicon-plus"></span> List Events</a>
  			</span>

		 		<span style="font-size:25px; color:blue"><strong>New Event</strong></span>

		 		<div style="height:15px;"></div>
				<div style = "margin:30px">
					 <form action = "" method = "post" enctype="multipart/form-data">
             <table border="0" class="table table-striped table-bordered table-hover">
                 <tr>
                     <td>Titulo</td>
                     <td><input type="text" name="titulo" required></td>
                 </tr>
                 <tr>
                     <td>Endereco do Evento</td>
                     <td><input type="text" name="endereco" required></td>
                 </tr>
                 <tr>
                     <td>Horario do Evento</td>
                     <td><input type="text" name="horario" required></td>
                 </tr>
                 <tr>
                     <td>Data do Evento</td>
                     <td><input type="text" name="data" required></td>
                 </tr>
                 <tr>
                     <td>Site do Evento</td>
                     <td><input type="text" name="site" required></td>
                 </tr>
                <tr>
                    <td>Banner do Evento</td>
                    <td><input type="file" name="fileimage" class = "box" required/><br/></td>
                </tr>
       					<tr>
         						 <td><input type="submit" name="submit" value="Save"></td>
       					</tr>
     				</table>
					 </form>

				</div>
   </body>
</html>
