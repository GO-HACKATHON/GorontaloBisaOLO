<?php 


function sendMessage($opt=null){
		
	 
		$content = array(
			"en" => $opt['pesan'],
		 );
		
		$fields = array(
			'app_id' => "26fa884a-5388-4ade-83f5-507af432d23e",
			'include_player_ids' => array($opt['oid']),
			'data' => array("foo" => "bar"),
			'contents' => $content
		);		
		
		$fields = json_encode($fields);
    	print("\nJSON sent:\n");
    	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic MGU0ZmU0NjMtOWM4OS00M2UxLTliMTItZjUzMjIzOTk1ODU0'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
}
 
