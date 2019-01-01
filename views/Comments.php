<div class="row">
<div class="container well" style="width: 80%">
<?php
include('metaData.php');

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
			$obj=new MetaData();
			$detail = $obj->getMetaData($returnCmt['url']);
			$image=$detail['image'];
			$desc=$detail['desc'];
		
			?>
			<div class="row" style="height:150px">
			<div class="col-md-8">
				<div class="col-md-12"><h1><b><a href=<?php  echo $returnCmt['url'];?>><?php echo $returnCmt['title']; ?></a></b></h1></div>

				<div class="col-md-12">
				<?php echo $desc; ?>
				<a href=<?php  echo $returnCmt['url'];?>>Visit Story</a>
			</div>
			</div>
		
			<div class="col-md-4">
					<?php if (empty($image)) {
						?>
						<img  src="/assets/NoImageFound.jpg.png" class="img-responsive" >
						<?php
					}else?>
					<img  class="img-responsive" src=<?php echo "'".$image."'"; ?>>
				</div>
			</div>
			
			</div>

		
		<div class="container well" style="width: 80%">
			<h4><?php if ($returnCmt['descendants']) {
				echo   $returnCmt['descendants']." Comments";
			}else echo "No Comments"; ?></h4>
			<hr style="size: 5px">
			<div class="row">
				<?php
				 $c=new Comments();
				$c->replyData($sid);
			}
				?>
			</div>
		
		</div>


	



	</div>




	<?php 

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

		
			?>
			<div class="">
				<?php if ($loop!=0) {
					# code...
				?>
				<div class="col-md-12" style="padding-left: <?php echo $loop."px"; ?>">
				<b><?php echo $timeFormat." ".$returnCmt['by'] ?> </b></br>	
				</div>
				<div class="col-md-12" style="padding-left: <?php echo $loop."px"; ?>">
				<p> <?php echo $returnCmt['text']; ?></p>	
				</div>
		
				</div>
				<?php }?>
				
			<?php
			
			if(array_search("kids", $keys))
			{
				foreach ($returnCmt['kids'] as $kid) {
					$this->replyData($kid,$loop+50);
					
				}
			}
			else
			{
			
			}

			
		}

	} 


