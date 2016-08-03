<?php
$botToken = "215663608:AAFFBj8OXQ2HbT3Cj2lmydwVeP4V2CDOaOo";
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents($website."/getupdates");
//print_r($update);
//$update = file_get_contents("php://input");
print_r($update);
$updatevar = json_decode($update,TRUE);
print_r($updatevar);
$text = $updatevar["result"][8]["message"]["chat"]["id"];
file_get_contents($website."/sendmessage?chat_id=144983285&text=web hook");

?>
