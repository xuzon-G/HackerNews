<div class="row">
<?php

	include('timeConvert.php');
 if (isset($_REQUEST['id'])) 
 	{	
	$sid=$_REQUEST['id'];

			$url="https://hacker-news.firebaseio.com/v0/item/".$sid.".json?print=pretty";
			$c=curl_init();
			curl_setopt($c,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($c, CURLOPT_URL, $url);
			$returnCmt=curl_exec($c);
			$returnCmt=json_decode($returnCmt,true);

			curl_close($c);
			?>
				<h4><?php echo $returnCmt['title']; ?></h4>
			<?php 
	$comment=new Comments();

	$comment->replyData($sid,$comment->loop);
}
	class Comments 
	{
	
		
		
	function replyData($id,$loop=0)
		{


			$url="https://hacker-news.firebaseio.com/v0/item/".$id.".json?print=pretty";
			$c=curl_init();
			curl_setopt($c,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($c, CURLOPT_URL, $url);
			$returnCmt=curl_exec($c);
			$returnCmt=json_decode($returnCmt,true);
			curl_close($c);
			$keys=array_keys($returnCmt);
			$time=new TimeConvert();
			$timeFormat=$time->get_time_ago($returnCmt['time']);
		
			?><div class="">
				<div class="col-md-12" style="padding-left: <?php echo $loop."px"; ?>">
				<b><?php echo $timeFormat." ".$returnCmt['by'] ?> </b></br>	
				</div>
				<div class="col-md-12" style="padding-left: <?php echo $loop."px"; ?>">
				<p> <?php echo $returnCmt['text']; ?></p>	
				</div>
		
				</div>
				
			<?php
			
			  

			
			if(array_search("kids", $keys))
			{
				foreach ($returnCmt['kids'] as $kid) {
					$this->replyData($kid,$loop+50);
					;
				}
			}
			else
			{
				echo "<hr>";
			}
		}

	}
	
	


	






?>
