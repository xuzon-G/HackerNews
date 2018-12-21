
		<div class="row">
		<div class="col-md-12" >
			<div class="row container-fluid">
		<?php
	include('metaData.php');
	include('timeConvert.php');
	//header("Content-type:application/json");
			$obj=new MetaData();

		$url="https://hacker-news.firebaseio.com/v0/jobstories.json?print=pretty";
		$c=curl_init();
		curl_setopt($c,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c,CURLOPT_URL,$url);
		$returnData=curl_exec($c);
		$returnData=json_decode($returnData,true);

			curl_close($c);

			$i=0;
			foreach ($returnData as $jobList) {
					$c=curl_init();
					if ($i==4) {
						break;
					}
				
		$url="https://hacker-news.firebaseio.com/v0/item/".$jobList.".json?print=pretty";
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_URL, $url);
		$jobData=json_decode(curl_exec($c),true);
		curl_close($c);
		$detail = $obj->getMetaData($jobData['url']);
			$image=$detail['image'];
			$desc=$detail['desc'];
			$time=new TimeConvert();
			$timeFormat=$time->get_time_ago($ret['time']);
		
			// 
				
	?>

	
		<div class="col-md-6" style="box-shadow: 0px 0px 2px #888888;overflow: hidden;height: 160px" >
				<div class="row">
				<div class="col-md-12" style="height:50px;">
					<h4><b><?php echo $jobData['title']; ?></b></h4>
					</div>
				</div>
				<div class="row" style="height:50px">
				<div class="col-md-10" style="font-size:11pt">
					<?php echo substr($desc,0,150) ;?>
					<a href=<?php echo $jobData['url'] ?>>Read Full Story</a>
					
				</div>
				<div class="col-md-2">
					<?php if (empty($image)) {
						?>
						<img src="/assets/NoImageFound.jpg.png" class="img-responsive img-thumbnail" style="height: 80px;width:100px">
						<?php
					}else{?>
					<img class="img-responsive img-thumbnail" style="height: 80px;width:100px"src=<?php echo "'".$image."'"; ?>  >
				<?php } ?>
				</div>
			</div>
			<div class="row">
					<div class="col-md-2 col-md-offset-1" style="color: #98999f">
					<h6><?php echo $timeFormat; ?></h6>
				</div>
						<div class="col-md-2 col-md-offset-1" style="color: #98999f">
					<h6><?php echo "by ".$jobData['by']; ?></h6>
				</div>
					<div class="col-md-2 col-md-offset-1" style="color: #98999f">
					<h6><?php echo $jobData['descendants']." ";?> 
					<?php
					if ($askData['descendants']>0) {
						// session_start();
						// $_SESSION['comments']=$item;
						?>
						<a href=<?php echo "/views/comments?id=".$jobList;?>> <i class="fas fa-comments" style="font-size:15px" ></i></a></h6>
						
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