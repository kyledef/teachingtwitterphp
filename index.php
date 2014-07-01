<?php

require_once("lib/twitter-api/TwitterAPIExchange.php");
require_once("creds.php");

$settings = array(
	'oauth_access_token' 		=> $creds->token,
    'oauth_access_token_secret' => $creds->token_secret,
    'consumer_key' 				=> $creds->consumer_key,
    'consumer_secret' 			=> $creds->consumer_secret
);

$twitter = new TwitterAPIExchange($settings);
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=kyle_def';


$response = $twitter->setGetfield($getfield)
					->buildOauth($url, 'GET')
					->performRequest();

echo json_encode($response);