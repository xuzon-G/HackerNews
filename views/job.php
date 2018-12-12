<?php
include('metaData.php');
//header("Content-type:application/json");
   	$obj=new MetaData();	
	if (!isset($_SESSION['joblist'])) {
	$url="https://hacker-news.firebaseio.com/v0/jobstories.json?print=pretty";
	$c=curl_init();
	curl_setopt($c,CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c,CURLOPT_URL,$url);
	$returnData=curl_exec($c);
	$returnData=json_decode($returnData,true);
	$returnData=implode("-",$returnData);
	$_SESSION['joblist']=$returnData;
		curl_close($c);
	}
	else{
	$returnData=$_SESSION['joblist'];
	
	}
	$returnData=explode("-", $returnData);
	
		foreach ($returnData as $jobList) {
		 $c=curl_init();		
     	$url="https://hacker-news.firebaseio.com/v0/item/".$jobList.".json?print=pretty";
     	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
     	curl_setopt($c, CURLOPT_URL, $url);
     	$jobData=json_decode(curl_exec($c),true);

     	curl_close($c);
		$obj->getMetaData($jobData['url']);
 			 

     	?>
     	<p></p>
			
		
			 <!-- <div class="col-md-6" style="box-shadow: 5px 10px 8px #888888;height:100px">  
			<h3><?php  //echo $jobData['title'] ?></h1>
				<a href=<?php//echo $jobData['url']; ?>>Full link </a>
			</div>
			-->
		</div>


     	<?php

		}
		
/*foreach ( $returnData as $jobList) {
	
     	$url="https://hacker-news.firebaseio.com/v0/item/".$joblist.".json?print=pretty";
     	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
     	curl_setopt($c, CURLOPT_URL, $url);
     	$jobData=curl_exec($c);
     	$jobData=json_decode($jobData,true);
     	print_r($jobData)


	}*/


?>