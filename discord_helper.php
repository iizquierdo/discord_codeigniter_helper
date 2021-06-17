<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @helper     Discord Webhook Message
 * @author     Ignacio Izquierdo 
 * @email  	   ignaciojavierizquierdo@gmail.com
 */
 


function discordSendMessage( $message, $webhook_id, $webhook_token,  $username = FALSE, $avatar_url = FALSE) {	
 	
	$url = "https://discord.com/api/webhooks/".$webhook_id."/".$webhook_token;

 	$hookObject = json_encode([
    "content" => $message,
    "username" => $username,
    "avatar_url" => $avatar_url,
    "tts" => false,
    "allowed_mentions"  => [
        "parse"=> ["users", "roles", "everyone"],
    ],      


	], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

	$ch = curl_init();

	curl_setopt_array( $ch, [
	    CURLOPT_URL => $url,
	    CURLOPT_POST => true,
	    CURLOPT_POSTFIELDS => $hookObject,
	    CURLOPT_HTTPHEADER => [
	        "Content-Type: application/json"
	    ]
	]);

	$response = curl_exec( $ch );
	curl_close( $ch );
	

	echo "Enviado a Discord!";


}