<?php
require_once('class_configManager.php'); 
require_once('class_lineProfiles.php');  
require_once('class_lineController.php');  
require_once('line_config.php'); //設定

if (!session_id()) {
    session_start();
}

$Line = new LineController();

if(isset($_COOKIE['access_token'])){
    $access_token=$_COOKIE['access_token'];
    $user = $Line->getLineProfile_access_token($access_token);//取得使用者資料
	print_r($user);
}else{
	header("Location: /index.php");
}