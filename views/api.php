<?php

$route=$_SERVER['REQUEST_URI'];
$route=explode('/', $route);
if (isset($route[3]) ) {
	header("content-type:application/json");
	$url="https://hacker-news.firebaseio.com/v0/item/".$route[3].".json?print=pretty";
			$ch=curl_init();
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_URL,$url);
			$returnData=curl_exec($ch);
			print_r($returnData);
			curl_close($ch);
			
}


?>