<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '376596062788677','9b8afe149c56cbcc5495a7b6a2e270c0' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://sannisthsoni.com/Market/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	    //checkuser('001','PT'); // To update local DB
	/* ---- Session Variables -----*/
	    //unset ($_SESSION['FBID']);           
            //unset ($_SESSION['FULLNAME']);
            $_SESSION['FBID'] = $fbid;           
            $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
	    $_SESSION['access_token'] =  $fbfullname;
	    $_SESSION['uname'] =$fbfullname;
	    
	    echo $_SESSION['access_token'];
	    echo "123";
    /* ---- header location after session ----*/
  header("Location: index.php?name=1");
} else {
  //$logoutUrl = $request->getLogoutUrl();
  $loginUrl = $helper->getLoginUrl();
  //echo "1223";
  header("Location: ".$loginUrl);
 //echo "1223";
}
?>