<?php 
	
function senToServer2($nama,$email,$nohp,$pass){
	
	
	$ch = curl_init();                    // Initiate cURL
	//$url = "http://c55.co/gcar/admin/user/gcarApiuser"; // Where you want to post data
	$url = "htttp://localhost/bentor/g-smart-car/backend/bogani/gcarApiuser"; // Where you want to post data
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POST, true);  // Tell cURL you want to post something
	curl_setopt($ch, CURLOPT_POSTFIELDS, "nama=$nama&email=$email&nohp=$nohp&pass=$pass"); // Define what you want to post
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the output in string format
	$output = curl_exec ($ch); // Execute
	curl_close ($ch); // Close cURL handle
	echo $output;

}

 