<?php

ini_set('error_reporting',E_ALL);
$botToken = "215663608:AAFFBj8OXQ2HbT3Cj2lmydwVeP4V2CDOaOo";
$website = "https://api.telegram.org/bot".$botToken;
//$update = file_get_contents($website."/getupdates");
//print_r($update);
$update = file_get_contents("php://input");
print_r($update);
var_dump($update);
$update = json_decode($update,TRUE);
print_r($update);
$chatid = $update["message"]["chat"]["id"];
var_dump($chatid);
$messgae=$update["message"]["text"];
switch($messgae){
	case "/test":
		sendmess($chatid,"test");
		break;
	case "/hi":
		sendmess($chatid,"hey there");
		break;
	default:
		sendmess($chatid,"default");

	
}
//$text = $updatevar["result"][200]["message"]["chat"]["id"];

function sendmess ($chatid,$mess)
{
   $url = $GLOBALS["website"]."/sendmessage?chat_id=144983285&text=".urlencode($mess);
   var_dump($url); 
   file_get_contents($url);
}    

?>
