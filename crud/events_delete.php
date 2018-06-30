<?php
	session_start();
	include_once 'events/events_db.php';
	$events = new Events();
	//$username = $_SESSION['username'];

	//getting id of the data from url
	$id_evento = $_GET['id'];
	//deleting the row from table
	$result =  $events->deleteEvent($id_evento);

	if ($result) {
		//redirecting to the display page (index.php in our case)
		header("location:events_list.php");
	}
?>
