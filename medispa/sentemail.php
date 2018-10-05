<?php
	$fields = [
		'name' => urlencode($_POST['name']),
		'email_to' =>urlencode($_POST['email']),
		'subject' => urlencode($_POST['subject']),
		'content' => urlencode($_POST['content'])
	];

	$username = "LotusBob";
	$password = "q37WPq5B";

	//var_dump($fields);
	$url = 'http://email.codewerk.co.uk';
	$fields_string = "";
	foreach($fields as $key=>$value) {
		$fields_string .= $key.'='.$value.'&';
	}
	rtrim($fields_string, '&');
	var_dump($fields_string);

	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);


	$encodedAuth = base64_encode($username.":".$password);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization : Basic ".$encodedAuth));
	//execute post
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);


?>
