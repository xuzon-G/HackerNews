<?php

/**
 * 
 */
class MetaData 
{
	public function getMetaData($url)
	{

		$image_list = array("twitter:image","thumbnail","twitter:thumbnail","img");
		$image_name = NULL;
		$desc_list = ["description","twitter:description"];

		$desc_name = NULL;
		$metaData=get_meta_tags($url);

		$keys = array_keys($metaData);
		echo "<pre>";
		print_r($keys);
		echo "</pre>";
		foreach($image_list as $img_list ){
			if (array_search($img_list, $keys)) {
				$image_name=$img_list;
				

			};
			/*if(array_search($item, $image_list))
				$image_name = $item;
			echo $image_name;
			if(array_search($item, $desc_list))
				$desc_name = item;*/
		}

	}

}

?>
