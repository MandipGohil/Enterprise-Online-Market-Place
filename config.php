<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("61160217625-9ot3dfmob2rdu3mjddqofviin2g6j5lu.apps.googleusercontent.com");
	$gClient->setClientSecret("LoCNo6gNtf9FSzEaZ4DJs3lI");
	$gClient->setApplicationName("CPI Login Tutorial");
	$gClient->setRedirectUri("http://sannisthsoni.com/Market/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>