<?php
	// Get all the proxies from the Proxies file
	$file = $argv[1];
	$file_content = file_get_contents($file);
	$proxies = explode("\n", $file_content);

	// loop through all the proxies
	for ($i=0; $i < count($proxies); $i++) { 

		// If the line is in blank, go to next iteration
		if (empty($proxies[$i])) { continue; }
		
		// Warn the user
		echo 'Trying ' . $proxies[$i] . ' ----> ';

		// Send the request to the DroneBL server
		$url = 'http://dronebl.org/lookup?ip=' . $proxies[$i];
		$ch = curl_init($url);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		$response = curl_exec($ch);

		// Check for the result
		$have_registers = '/There are listings for <strong>(.)+<\/strong> in DroneBL/';
		$no_registers = '/No specific incidents regarding <strong>(.)+<\/strong> were found in DroneBL\'s incident tracking system/';

		if (preg_match($have_registers, $response)) {
			echo "Fail\n";
		}else if(preg_match($no_registers, $response)){
			echo "Ok\n";
		}else {
			echo "Error\n";
		}
	}
?>