<?php

	include_once 'events/events_db.php';
	$events = new Events();
	//$username = $_SESSION['username'];

	$readEvents = $events->readAllEvents();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Events - OOP CRUD Operation</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<?php
		include "menu.php";
	?>

<div class="container">
	<div style="height:50px;"></div>
	<div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:70%;">
		<span style="font-size:25px; color:blue"><strong>List All Events</strong></span>
		<span class="pull-right"><a href="events_save.php" class="btn btn-primary">
      <span class="glyphicon glyphicon-plus"></span> Add New</a>
    </span>

		<div style="height:15px;"></div>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<th>Evento</th>
				<th>Data</th>
        <th>Banner</th>
				<th>Action</th>
			</thead>
			<tbody>
         <?php
				 while($row = mysqli_fetch_array($readEvents)) {
				 ?>
					<tr>
						<td><?php echo $row['titulo']; ?></td>
						<td><?php echo $row['data']; ?></td>
            <td> <img src="<?php echo $row['url_image']; ?>" /> </td>
						<td>
							<?php
						  echo "<a href=\"events_edit.php?id=$row[id_evento]\" class=\"btn btn-danger\"> <span class=\"glyphicon glyphicon-trash\"></span> Edit</a> ||
							      <a href=\"events_delete.php?id=$row[id_evento]\" class=\"btn btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\"> <span class=\"glyphicon glyphicon-trash\"></span>Delete</a>";
	            ?>
						</td>
					</tr>
					<?php
					}
					?>
			</tbody>
		</table>

</div>
</body>
</html>
