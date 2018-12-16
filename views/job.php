
		<div class="row">
		<div class="col-md-12" >
			<div class="row container-fluid">
		<?php
	include('metaData.php');
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
			// 
				
	?>

	
	
	<div class="col-md-6 " style="box-shadow: 0px 0px 15px -10px #888888;height:150px; overflow: hidden;margin-top: 5px ">
		<div class="row">
			<div class="col-md-12">
				<label><h4><?php  echo $jobData['title'];?></h4></label>
				
			</div>
			<?php  $obj->getMetaData($jobData['url']);  ?>
			
		
	</div>

	

	
	<?php $i++;
	}?>
</div>
</div>
</div>
</div>
</body>
</html>