<?php
if(!isset($_SESSION['list']))
		{
			$url = "https://hacker-news.firebaseio.com/v0/newstories.json?print=pretty";
			$c = curl_init();
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_URL, $url);
			$returnData = json_decode(curl_exec($c),true);
			$returnData = implode("-",$returnData);
			$_SESSION['list'] = $returnData;
			curl_close($c);
		}else{
			$returnData = $_SESSION['list'];
		}
		$returnData = explode("-",$returnData);
		$i = 0;
		$pages = count($returnData)/5;
		echo $pages."ARE TEHRE<br/>";
		foreach ($returnData as $item ) {
			if($i==5){
				break;
			}
			$url = "https://hacker-news.firebaseio.com/v0/item/".$item.".json?print=pretty";
			$c = curl_init();
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_URL, $url);
			$ret= json_decode(curl_exec($c),true);
			curl_close($c);
?>
<p>
	<?php echo $ret['title']; ?>
	<br/>
	<a href="<?php echo $ret['url']; ?>">Full story</a>
	<?php echo date("d-m-Y",$ret['time']); ?>
</p>
<?php
$i++;
}
?>