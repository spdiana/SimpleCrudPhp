<?php

	include_once 'json/build_json.php';
	$events = new GetJsonObjects();

	$readEvents = $events->selectAllEvents();

  echo $readEvents;
?>
