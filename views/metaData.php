<?php
/**
*
*/

class MetaData
{
	public	$image_list = ["twitter:image","thumbnail","twitter:thumbnail","img"];
		public $image_name ;
		public $desc_list = ["description","twitter:description"];
		public $desc_name ;
		public $keys=[];
		public $metaData=[];
		public $url;
		

	public function getMetaData($url)
	{
		
		$this->metaData=get_meta_tags($url);
		$this->keys=array_keys($this->metaData);
		$this->url=$url;
		$this->desc_name=$this->getDesc();
		$this->image_name=$this->getImage();
		return [
			"image"=>$this->metaData[$this->image_name],
			"desc"=>$this->metaData[$this->desc_name]
		];
		
	}

	public 	function getDesc()
	{

		// print_r($this->keys);
		foreach ($this->desc_list as $dlist)
	 		{
			if (array_search($dlist, $this->keys)) 
				{
					return $dlist;
	
				}
			}

	}

	public function getImage()
	{

		foreach ($this->image_list as $imgLst) 
		{
			if(array_search($imgLst,$this->keys ))
			 {

				return $imgLst;
			}
			
		}

	}


	
}
?>