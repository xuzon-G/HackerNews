<!-- <link rel="stylesheet" type="text/css" href="/assets/style.css"> -->
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
      include_once('timeConvert.php');

			$url = "https://hacker-news.firebaseio.com/v0/newstories.json?print=pretty";
			$c = curl_init();
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_URL, $url);
			$returnData = json_decode(curl_exec($c),true);
			$returnData = implode("-",$returnData);
			$_SESSION['list'] = $returnData;
			curl_close($c);
		
		$returnData = explode("-",$returnData);
		$obj=new MetaData();
		$c = curl_init();
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		for($i=0;$i<=5;$i++){
			$item = $returnData[$i];
			$url = "https://hacker-news.firebaseio.com/v0/item/".$item.".json";
			curl_setopt($c, CURLOPT_URL, $url);
			$ret= json_decode(curl_exec($c),true);
			$detail = $obj->getMetaData($ret['url']);
			$image=$detail['image'];
			$desc=$detail['desc'];
			$time=new TimeConvert();
			$timeFormat=$time->get_time_ago($ret['time']);
		
			



				
			
			?>
			<div class="col-md-6" style="box-shadow: 0px 0px 2px #888888;overflow: hidden;height: 160px">
				<div class="row">
				<div class="col-md-12" style="height:50px;">
					<h4><b><?php echo $ret['title']; ?></b></h4>
					</div>
				</div>
				<div class="row" style="height:80px">
				<div class="col-md-10" style="font-size:11pt">
					<?php echo substr($desc,0,150) ;?>
					<a href=<?php echo $ret['url'] ?>>Read Full Story</a>
					
				</div>
				<div class="col-md-2">
					<?php if (empty($image)) {
						?>
						<img src="/assets/NoImageFound.jpg.png" class="img-responsive" >
						<?php
					}else?>
					<img class="img-responsive" src=<?php echo "'".$image."'"; ?>  >
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="height: 20px;color: #98999f">
					<h6><?php echo $timeFormat; ?></h6>
				</div>
			</div>
				
			</div>

		<?php }
?>
</div>
</div>