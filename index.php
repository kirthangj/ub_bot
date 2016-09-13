<?php
include("Telegram.php");

// Set the bot TOKEN
$bot_id = "242900232:AAGfh68XLX2OLP38cFEIaY0NPBOVRMPrv3g";
// Instances the class
$telegram = new Telegram($bot_id);

/*  manually take some parameters
*  $result = $telegram->getData();
*  $text = $result["message"] ["text"];
*  $chat_id = $result["message"] ["chat"]["id"];
*/

// Take text and chat_id from the message
$text = $telegram->Text();
$chat_id = $telegram->ChatID();

// Check if the text is a command
if(!is_null($text) && !is_null($chat_id)){
	if ($text == "/test") {
		if ($telegram->messageFromGroup()) {
			$reply = "Chat Group";
		} else {
			$reply = "Private Chat";
		}
	        // Create option for the custom keyboard. Array of array string
	        $option = array( array("A", "B"), array("C", "D") );
	        // Get the keyboard
		$keyb = $telegram->buildKeyBoard($option);
		$content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => $reply);
		$telegram->sendMessage($content);
	}
	
	
	if ($text == "/where") {
	    // Send the Catania's coordinate
	    $content = array('chat_id' => $chat_id, 'latitude' => "37.5", 'longitude' => "15.1" );
	    $telegram->sendLocation($content);
	}
}

?>

