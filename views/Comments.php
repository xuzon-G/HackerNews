<?php

	include('timeConvert.php');
 if (isset($_REQUEST['id'])) 
 	{	
	$sid=$_REQUEST['id'];
	$comment=new Comments();
	$comment->replyData($sid);
}
	class Comments 
	{

		
		
	function replyData($id)
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
			$timeFormat=$time->get_time_ago($askData['time']);

			echo $returnCmt['text']."<br>";
			echo "<b>By ".$returnCmt['by']."</b></br>";
			if(array_search("kids", $keys))
			{
				foreach ($returnCmt['kids'] as $kid) {
					$this->replyData($kid);
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
