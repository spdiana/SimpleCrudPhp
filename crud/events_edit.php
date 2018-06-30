<?php
include_once 'events/events_db.php';
$events = new Events();
//$username = $_SESSION['username'];

$id_evento = $_GET['id'];
$readEvents = $events->readEventById($id_evento);
$row = mysqli_fetch_array($readEvents);

if (isset($_POST['submit'])){
	extract($_POST);
	$register = $events->updateEvent($titulo, $endereco, $horario, $data, $site, $id_evento);
	if ($register) {
		// Registration Success
		echo "Successfully updated data";
		header("location:events_list.php");
	} else {
		// Registration Failed
		echo "failed to update data";
	}
}
?>


<html>
<head>
	<title>Edit Data</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<br/><br/>

	<?php
	include "menu.php";
	?>

	<div class="container">
		<div style="height:50px;"></div>
		<div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:70%;">

			<span style="font-size:25px; color:blue"><strong>Edit Event</strong></span>
			<span class="pull-right"><a href="events_list.php"  class="btn btn-primary">
				<span class="glyphicon glyphicon-plus"></span> List Events</a>
			</span>

			<div style="height:15px;"></div>
			<form name="form1" method="post" action="">
				<table border="0" class="table table-striped table-bordered table-hover">
					<tr>
						<td>Titulo</td>
						<td><input type="text" name="titulo" value="<?php echo $row['titulo']?>"></td>
					</tr>
					<tr>
						<td>Endereco do Evento</td>
						<td><input type="text" name="endereco" value="<?php echo $row['endereco']?>"></td>
					</tr>
					<tr>
						<td>Horario do Evento</td>
						<td><input type="text" name="horario" value="<?php echo $row['horario']?>"></td>
					</tr>
					<tr>
						<td>Data do Evento</td>
						<td><input type="text" name="data" value="<?php echo $row['data']?>"></td>
					</tr>
					<tr>
						<td>Site do Evento</td>
						<td><input type="text" name="site" value="<?php echo $row['site']?>"></td>
					</tr>
					<tr>
						<td><input type="hidden" name="id_evento" value=<?php echo $id_evento ?>></td>
						<td><input type="submit" name="submit" value="Update"></td>
					</tr>
				</table>
			</form>
		</body>
		</html>
