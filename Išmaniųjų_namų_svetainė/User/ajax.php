<?php

header('Content-Type: application/json');

// Set up the ORM library
require_once('setup.php');

if (isset($_GET['start']) AND isset($_GET['end'])) {
	
	$start = $_GET['start'];
	$end = $_GET['end'];
	$data = array();

	// Select the results with Idiorm
	$results = ORM::for_table('collecteddata')
			->where_gte('Date', $start)
			->where_lte('Date', $end)
			->order_by_desc('Date')
			->find_array();


	// Build a new array with the data
	foreach ($results as $key => $value) {
		$data[$key]['label'] = $value['Date'];
		$data[$key]['value'] = $value['TempOutside'];
	}

	echo json_encode($data);
}
?>