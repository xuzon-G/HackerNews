<div class="row container">
		<div class="col-md-12" >
			<div class="row container-fluid">

<?php

		

	include('timeConvert.php');
	//header("Content-type:application/json");
		

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
		
			$time=new TimeConvert();
			$timeFormat=$time->get_time_ago($askData['time']);

		
			// 
				
	?>

	
		<div class="col-md-12" style="overflow: hidden; border:1px solid #888888;margin-top:2px;border-left-style: none;border-right-style: none">
				<div class="row">
				<div class="col-md-12">
					<h4><b><?php echo $askData['title']; ?></b></h4>
					</div>
				</div>
					<div class="row">
					<div class="col-md-3 " style="color: #98999f">
					<h6><a href=""> view post details</a></h6>
				</div> 
					<div class="col-md-3" style="color: #98999f">
					<h6><i class="far fa-clock" style="font-size: 15px"></i> <?php echo $timeFormat; ?></h6>
				</div> 
				
						<div class="col-md-3 " style="color: #98999f">
					<h6><i class="fas fa-user-tie" style="font-size:15px"></i> <?php echo $askData['by']; ?></h6>
				</div>
					<div class="col-md-3 " style="color: #98999f">
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
