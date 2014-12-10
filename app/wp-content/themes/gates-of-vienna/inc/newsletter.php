<?php
/*///////////////////////////////////////////////////////////////////////
Part of the code from the book 
Building Findable Websites: Web Standards, SEO, and Beyond
by Aarron Walter (aarron@buildingfindablewebsites.com)
http://buildingfindablewebsites.com

Distrbuted under Creative Commons license
http://creativecommons.org/licenses/by-sa/3.0/us/
///////////////////////////////////////////////////////////////////////*/


function storeAddress(){
	
	// Validation
	if(!$_POST['email']){ return "Please enter an email address"; } 

	if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $_POST['email'])) {
		return "Please enter an email address"; 
	}

	require_once('lib/MCAPI.class.php');
	// grab an API Key from http://admin.mailchimp.com/account/api/
	$api = new MailChimp('73c8f08d4e2a5eb3bf6022d900be095d-us1');
	
	// grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
	// Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
	$list_id = "09b46b8fa8";

	/*
	if($api->listSubscribe($list_id, $_POST['email'], '') === true) {
		// It worked!	
		return 'Thanks for subscribing!';
	}else{
		// An error ocurred, return error message	
		if ($api->errorCode == '214') {
	      return 'Already subscribed';
	   } else {
		   return 'Error';
	   }
	}
	*/

	$result = $api->call('lists/subscribe', array(
		'id' 								=> $list_id,
		'email'             => array('email'=>$_POST['email']),
    //	'merge_vars'        => array('FNAME'=>$_POST['firstname'], 'LNAME'=>$_POST['lastname']),
    'double_optin'      => false,
    'update_existing'   => true,
    'replace_interests' => false,
    'send_welcome'      => false,
	));
	//	print_r($result);
	if (array_key_exists('status', $result)):
		return 'Please enter a valid email address';
	else:
		return 'Thank you for subscribing';
	endif;
	
}

// If being called via ajax, autorun the function
echo storeAddress();
//	echo storeAddress();
?>
