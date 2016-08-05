<?php

ini_set('error_reporting',E_ALL);
$botToken = "242900232:AAGfh68XLX2OLP38cFEIaY0NPBOVRMPrv3g";
$website = "https://api.telegram.org/bot".$botToken;
//$update = file_get_contents($website."/getupdates");
//print_r($update);
var_dump($website);
$update = file_get_contents("php://input");
print_r($update);
var_dump($update);
$update = json_decode($update,TRUE);
print_r($update);
$chatid = $update["message"] ["chat"]["id"];
var_dump($chatid);
$message=$update["message"] ["text"];
var_dump($message);
switch($message){
	case "/hi":
		sendmess($chatid,"hello");
		break;
	case "/bye":
		sendmess($chatid,"bye");
		break;
	default:
		sendmess($chatid,"enter one of the above");

	
}
//$text = $updatevar["result"][200]["message"]["chat"]["id"];

function sendmess ($chatid,$mess)
{
   $url = $GLOBALS["website"]."/sendmessage?chat_id=".$chatid."&text=".urlencode($mess);
   var_dump($url); 
   file_get_contents($url);
}    

?>
