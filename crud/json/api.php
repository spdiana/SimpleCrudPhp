<?php

	//include('../db/db_connect.php');
  //include_once '../db/db_connect.php';

  include('build_json.php');
  $getFromDB = new GetJsonObjects();

  $readEvents = $getFromDB->selectAllEvents();


	//an array to display response
	$response = array();

	//if it is an api call
	//that means a get parameter named api call is set in the URL
	//and with this parameter we are concluding that it is an api call
	if(isset($_GET['apicall'])){

		switch($_GET['apicall']){

			//the READ operation
			//if the call is getheroes
			case 'getevents':

				$response['error'] = false;
				$response['message'] = 'Request successfully completed';
        $response['events'] = $readEvents;

			break;

    }
	}else{
		//if it is not api call
		//pushing appropriate values to response array
		$response['error'] = true;
		$response['message'] = 'Invalid API Call';
	}

	//displaying the response in json structure
	echo json_encode($response, JSON_UNESCAPED_SLASHES);
