<?php

	// Azure
define ('MAIL_BACKEND', 'smtp');
define ('SMTP_HOST', 'smtp.sendgrid.net');
define ('SMTP_PORT', '587');
define ('SMTP_USER', 'azure_a5d77e7b93af5011356ebecedc3ea3e8@azure.com');
define ('SMTP_PASSWORD', '3L77rnpXZ83N7AQ');

	// MailChimp
	$APIKey = '89d53601cd6c608607b3f4c60c3f5601-us8';
	$listID = '6df4a5661d';

	$email   = $_POST['email'];

	require_once('inc/MCAPI.class.php');

	$api = new MCAPI($APIKey);
	$list_id = $listID;

	if($api->listSubscribe($list_id, $email) === true) {
		$sendstatus = 1;
		$message = 'Success! Check your email to confirm sign up.';
	} else {
		$sendstatus = 0;
		$message = 'Error: ' . $api->errorMessage;
	}

	$result = array(
		'sendstatus' => $sendstatus,
		'message' => $message
	);

	echo json_encode($result);

?>