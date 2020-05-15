<?php
require_once('class_configManager.php'); 
require_once('class_lineProfiles.php');  
require_once('class_lineController.php');  
require_once('line_config.php'); //設定

if (!session_id()) {
    session_start();
}

if(isset($_COOKIE['access_token'])){
	
    header("Location: userdata.php");
	
}else{
	
	$ts = time(); 
	$state=md5($ts);

	$_SESSION['_line_state'] = $state;

	$Line = new LineController();

	$url= $Line->lineLogin($state);  //產生登入連結

	header("Location: $url");
}