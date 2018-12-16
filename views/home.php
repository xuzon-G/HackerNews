<link rel="stylesheet" type="text/css" href="/assets/style.css">
<div class="row">
		<div class="col-md-2">
			<div id="navBar">
				<ul>
  					<li><a href="/views/home/NewStories" >New Stories</a></li>
  					<li><a href="/views/TopStories"> Top Stories</a></li>
				    <li><a href="/views/BestStories">Best Stories</a></li>
  				
				</ul>
			</div>
		</div>

		<div class="col-md-10" >
			<div class="row container-fluid">

<?php 
      include ('metaData.php');

			$url = "https://hacker-news.firebaseio.com/v0/newstories.json?print=pretty";
			$c = curl_init();
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_URL, $url);
			$returnData = json_decode(curl_exec($c),true);
			$returnData = implode("-",$returnData);
			$_SESSION['list'] = $returnData;
			curl_close($c);
		
		$returnData = explode("-",$returnData);
		$i = 0;
		$pages = count($returnData)/5;
		echo $pages."ARE TEHRE<br/>";
		$obj=new MetaData();
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
<div class="col-md-6 " style="box-shadow: 0px 0px 15px -10px #888888;height:150px; overflow: hidden;margin-top: 5px ">
		<div class="row">
			<div class="col-md-12">
				<label><h4><?php  echo $ret['title'];?></h4></label>
				
			</div>
			<?php  $obj->getMetaData($ret['url']);  ?>
			
		
	</div>

	

	
	<?php $i++;
	}?>
</div>
</div>
</div>
</div>
<?php

/**
 * 
 */




?>
