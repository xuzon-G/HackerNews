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
		$this->display($this->image_name,$this->desc_name);
		
	

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


	public function display($image,$desc)
	{  ?>

		
		</div>
		<div class="row">
			<div class="col-md-9">
			<p><?php  echo substr($this->metaData[$desc],0,300)."<a href=".$this->url."> Read Full Story</a>";  ?></p>
		
		</div>
		<div class="col-md-3 container" >
			<img style="height: 80px;width:100px;float: right;"class=" img-fluid img-thumbnail" alt="image not found"    src=<?php echo "'".$this->metaData[$image]."'" ; ?> />
		</div>
		</div> 

	<?php		

	}


}
?>