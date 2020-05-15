<?php
require_once('class_configManager.php'); 
require_once('class_lineProfiles.php');  
require_once('class_lineController.php');  
require_once('line_config.php'); //設定

if (!session_id()) {
    session_start();
}

$code = $_GET['code'];
$state = $_GET['state'];
$session_state = $_SESSION['_line_state'];

unset($_SESSION['_line_state']);
if ($session_state !== $state) {
    echo '存取錯誤';
    exit;
}

$Line = new LineController();

$access_token = $Line->getAccessToken($code);//取得使用者資料
//$_SESSION['access_token']=$access_token;
setcookie("access_token",$access_token, time()+3600*24*14);//把他記憶14天
$user = $Line->getLineProfile_access_token($access_token);//取得使用者資料

print_r($user);
/*
stdClass Object ( 
[userId] => 唯一ID 
[displayName] => LINE用戶自己設定的名字 
[pictureUrl] => AVARTA大頭圖
[statusMessage] => 用戶自己寫的狀態
)
*/
 