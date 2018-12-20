<div class="row">
		<div class="col-md-12" >
			<div class="row container-fluid">

<?php

		
	include('metaData.php');
	include('timeConvert.php');
	//header("Content-type:application/json");
			$obj=new MetaData();

		$url="https://hacker-news.firebaseio.com/v0/askstories.json?print=pretty";
		$c=curl_init();
		curl_setopt($c,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c,CURLOPT_URL,$url);
		$returnData=curl_exec($c);
		$returnData=json_decode($returnData,true);

			curl_close($c);

			$i=0;
			foreach ($returnData as $askList) {
					$c=curl_init();
					if ($i==4) {
						break;
					}
				
		$url="https://hacker-news.firebaseio.com/v0/item/".$askList.".json?print=pretty";
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_URL, $url);
		$askData=json_decode(curl_exec($c),true);
		curl_close($c);
		$detail = $obj->getMetaData($askData['url']);
			$image=$detail['image'];
			$time=new TimeConvert();
			$timeFormat=$time->get_time_ago($askData['time']);

		
			// 
				
	?>

	
		<div class="col-md-12" style="box-shadow: 0px 0px 2px #888888;overflow: hidden;height:60px;border-radius: 5px;margin-top:5px">
				<div class="row">
				<div class="col-md-12" style="height:30px;">
					<h4><b><?php echo $askData['title']; ?></b></h4>
					</div>
				</div>
				<div class="row" style="height:20px">
				<div class="col-md-2" style="color: #98999f">
					<h6><?php echo $timeFormat; ?></h6>
				</div>
					<div class="col-md-1 " style="color: #98999f">
					<h6><?php echo "by ".$askData['by']; ?></h6>
				</div>
					<div class="col-md-1 " style="color: #98999f">
					<h6><?php echo $askData['descendants']." ";?> 
					<?php
					if ($askData['descendants']>0) {
						// session_start();
						// $_SESSION['comments']=$item;
						?>
						<a href=<?php echo "/views/comments?id=".$askList;?>> <i class="fas fa-comments" style="font-size:15px" ></i></a></h6>
						
					<?php }else {?>
						<i class="fas fa-comments" style="font-size:15px"></i></h6>
					
					<?php }?>
									

					 
				</div>
			</div>
			
				
			</div>

	

	
	<?php $i++;
	}?>
</div>
</div>
</div>
</div>
</body>
</html>
