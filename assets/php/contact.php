<?php

	// Mail settings
	/**/
	require("sendgrid-php/sendgrid-php.php");
	$sendgrid = new SendGrid('mitou_admin', '1Q"w3E$r');
//	$sendgrid = new SendGrid('azure_6ca73ca049a7dfc8da2e0db4d482c377@azure.com', 'Ga879MNNhKBO3c0');

	$subject = "未踏HPからメールが届きました";

	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {

		$content  = "Name: "     . $_POST["name"]    . "\r\n";
		$content .= "Email: "    . $_POST["email"]   . "\r\n";
		$content .= "Message: "  . "\r\n" . $_POST["message"];

		$email = new SendGrid\Email();
		$email
		    ->addTo($to)
		    ->setFrom($_POST["email"])
		    ->setSubject($subject)
		    ->setText($content);

		if ($sendgrid->send($email)) {

			$result = array(
				"message" => "Thanks for contacting us.",
				"sendstatus" => 1
			);

			echo json_encode($result);

		} else {

			$result = array(
				"message" => "Sorry, something is wrong.",
				"sendstatus" => 0
			);

			echo json_encode($result);

		}

	}
?>