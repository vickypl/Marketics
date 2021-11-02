<?php
	// Account details
	$apiKey = urlencode('your api key');
	
	// Message details
	$numbers = array(mobile number);
	//$message = rawurlencode('Data saved. ref_num:'$_POST["rnum"]', Name:'$_POST["cnum"]'');
 	$message = rawurlencode('Yo yo the massage sending is successfull....54');
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>
<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
