<?php
/**
 * new
 */
class NewsCategories

{
	public $arr = array();
	public function getStories($stories)
	{
		$url="https://hacker-news.firebaseio.com/v0/".$stories.".json?print=pretty";
		$c=curl_init();
		curl_setopt($c, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($c, CURLOPT_URL, $url);
		$returnItem=curl_exec($c);
		$returnItem=json_decode($returnItem);
		curl_close($c);

		$i=0;
		foreach($returnItem as $item) {
			
			if ($i==10) {
				break;

			}

			
			$url="https://hacker-news.firebaseio.com/v0/item/".$item.".json?print=pretty";
			$ch=curl_init();
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_URL,$url);
			$returnData=curl_exec($ch);
			$returnData=json_decode($returnData,true);
			curl_close($ch);
			?>
	$returnData['text'];

				
	
		<?php }
		

	
	}


}

// $obj=new NewsCategories();
// $obj->getStories("newstories");





?>
