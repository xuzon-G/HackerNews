<div class="row">
		<div class="col-md-12" >
			<div class="row container-fluid">

<?php

	include('timeConvert.php');
	//header("Content-type:application/json");
		

		$url="https://hacker-news.firebaseio.com/v0/showstories.json?print=pretty";
		$c=curl_init();
		curl_setopt($c,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c,CURLOPT_URL,$url);
		$returnData=curl_exec($c);
		$returnData=json_decode($returnData,true);

			curl_close($c);

			$i=0;
			foreach ($returnData as $showList) {
					$c=curl_init();
					if ($i==4) {
						break;
					}
				
		$url="https://hacker-news.firebaseio.com/v0/item/".$showList.".json?print=pretty";
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_URL, $url);
		$showData=json_decode(curl_exec($c),true);
		curl_close($c);
			$time=new TimeConvert();
			$timeFormat=$time->get_time_ago($showData['time']);

		
			// 
				
	?>

	
		<div class="col-md-12" style="overflow: hidden; border:1px solid #888888;margin-top:2px;border-left-style: none;border-right-style: none ;text-align: center;">
				<div class="row">
				<div class="col-md-12">
					<h4><b><?php echo $showData['title']; ?></b></h4>
					</div>
				</div>
				<div class="row" >
				<div class="col-md-1 col-md-offset-4" style="color: #98999f">
					<h6><?php echo $timeFormat; ?></h6>
				</div>
					<div class="col-md-1 " style="color: #98999f">
					<h6><?php echo "by ".$showData['by']; ?></h6>
				</div>
					<div class="col-md-1 " style="color: #98999f">
					<h6><?php echo $showData['descendants']." ";?> 
					<?php
					if ($showData['descendants']>0) {
						// session_start();
						// $_SESSION['comments']=$item;
						?>
						<a href=<?php echo "/views/comments?id=".$showList;?>> <i class="fas fa-comments" style="font-size:15px" ></i></a></h6>
						
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
