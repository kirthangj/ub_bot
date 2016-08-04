<?php

ini_set('error_reporting',E_ALL);
$botToken = "215663608:AAFFBj8OXQ2HbT3Cj2lmydwVeP4V2CDOaOo";
$website = "https://api.telegram.org/bot".$botToken;
//$update = file_get_contents($website."/getupdates");
//print_r($update);
$update = file_get_contents("php://input");
print_r($update);
$update = json_decode($update,TRUE);
print_r($update);
$chat_id = $update["message"]["chat"]["id"];
print_r($chat_id);
$messgae=$update["message"]["text"];
switch($messgae){
	case "/test":
		sendmess($chat_id,"test");
		break;
	case "/hi":
		sendmess($chat_id,"hey there");
		break;
	default:
		sendmess($chat_id,"default");

	
}
//$text = $updatevar["result"][200]["message"]["chat"]["id"];

function sendmess ($chat_id,$mess)
{
    $url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&text".urlencode($mess);
    file_get_contents($url);
}    

?>
