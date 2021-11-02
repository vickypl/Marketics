<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://sms-voice-messages.p.rapidapi.com/call/%252B12167101101/%7B+917828789845%7D",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "",
	CURLOPT_HTTPHEADER => array(
		"content-type: multipart/form-data",
		"x-rapidapi-host: sms-voice-messages.p.rapidapi.com",
		"x-rapidapi-key: 8be17b22c2msh4198a0a2b8dbef1p1ead8cjsn5bce63cb385c"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
