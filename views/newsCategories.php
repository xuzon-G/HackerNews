<?php
 
$route = $_SERVER["REQUEST_URI"];
$route = explode("/",$route);

$routeName= $route[count($route)-1];


 if (!empty(substr($routeName,0, strpos($routeName, "?")))) {
 	$routeName=substr($routeName,0, strpos($routeName, "?"));
 }
 $pagePath= $routeName;

 $routeName=strtolower($routeName); 

if ($routeName=="newstories")
	$category="New Stories";
if ($routeName=="topstories")
	$category="Top Stories";
if ($routeName=="beststories")
	$category="Best Stories";


?>


<div class="row">
	<div class="col-md-2">
		<div id="navBar" style="font-family: 'Black Ops One', cursive;">
			<ul style="background-color:#222;color:#9898;border-radius:5px 5px 0px 0px;">
				<li><a href="/views/home/NewStories" >New Stories</a></li>
				<li><a href="/views/TopStories"> Top Stories</a></li>
				<li><a href="/views/BestStories">Best Stories</a></li>
				
			</ul>
		</div>
			<div class="col-md-12 container-fluid" >
		<h3><?php echo $category;  ?> <i class="fas fa-angle-double-right"></i></h3> 
		</div>
	</div>
	<div class="col-md-10" >


		<div class="row container-fluid">

<?php
$story=new NewsCategories();
$story->getStories($routeName);
class NewsCategories

{
	public $arr = array();


	public function getStories($stories)
	{
	
				
			include ('metaData.php');
			include_once('timeConvert.php');
						$url = "https://hacker-news.firebaseio.com/v0/".$stories.".json?print=pretty";
						$c = curl_init();
						curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($c, CURLOPT_URL, $url);
						$returnData = json_decode(curl_exec($c),true);

						$returnData = implode("-",$returnData);

						$_SESSION['list'] = $returnData;
						curl_close($c);
					
					$returnData = explode("-",$returnData);
					$obj=new MetaData();
					$c = curl_init();
					curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
					// range start
							$range=array("start"=>0,"end"=>4);
							if (isset($_GET['page'])) {
								$range['start']=($_GET['page']-1)*5;
								$range['end']=($_GET['page']*5)-1;
							}
					// range ends



					for($i=$range['start'];$i<=$range['end'];$i++){
						$item = $returnData[$i];
						$url = "https://hacker-news.firebaseio.com/v0/item/".$item.".json";
						curl_setopt($c, CURLOPT_URL, $url);
						$ret= json_decode(curl_exec($c),true);
						if ($i<=$range['start']+1) {
							 $detail = $obj->getMetaData($ret['url']);
						 $image=$detail['image'];
						 $desc=$detail['desc'];
						}else {
							unset($image);
							unset($desc);
							}						
					
					
						$time=new TimeConvert();
						$timeFormat=$time->get_time_ago($ret['time']);
						
			    ?>
					
			    <?php
			    	if ($i<=$range['start']+1) {
			    	?>
			    	<div class="col-md-6" style="box-shadow: 0px 0px 2px #888888;overflow: hidden;height: 600px"  >
				
					
						
				<div class="row" >
						<div class="col-md-12">
							<?php if (isset($image)) { ?>
							 
							<img style="height:380px;padding-bottom: 10px;padding-top: 10px" class="img-responsive " src=<?php echo "'".$image."'"; ?>  >
							 <?php }else {?>
							 	<img src="/assets/noimage.gif" class="img-responsive " style="height: 380px;padding-top: 10px;padding-bottom: 10px">
							 <?php }?> 
						</div>
					</div>	
					
		
					<div class="row">
					<div class="col-md-9" style="font-size:11pt">
						<div class="col-md-12">
							<h4><b><?php echo $ret['title']; ?></b></h4>
								<?php if (isset($desc)) {
							?>
							<p><?php echo $desc; ?></p> <?php }?> 
						</div> 
					</div>
				
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12 " style="color: #98999f">
								<h6><a href=<?php echo "/views/comments?id=".$item;?>> view post details</a></h6>
							</div>
							<div class="col-md-12" style="color: #98999f">
								<h6><i class="far fa-clock" style="font-size: 15px"></i> <?php echo $timeFormat; ?></h6>
							</div>
							
							<div class=" col-md-12" style="color: #98999f">
								<h6><i class="fas fa-user-tie" style="font-size:15px"></i> <?php echo $ret['by']; ?></h6>
							</div>
							<div class="col-md-12" style="color: #98999f">
							
								<?php
								if ($ret['descendants']>0) {
								?>
								<a href=<?php echo "/views/comments?id=".$item;?>> <i class="fas fa-comments" style="font-size:15px" ></i></a>
								
								<?php }else {?>
								<i class="fas fa-comments" style="font-size:15px"></i>
								
								<?php }?>
									<?php echo $ret['descendants']." ";?>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
			    	<?php }else{ ?>


							<div class="col-md-4" style="box-shadow: 0px 0px 2px #888888;overflow: hidden;height: 180px" >
				
					<div class="row">
					<div class="col-md-8" style="font-size:11pt">
						<div class="col-md-12">
							<h4><b><?php echo $ret['title']; ?></b></h4>
							
						</div> 
					</div>
				
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-12 " style="color: #98999f">
								<h6><a href=<?php echo "/views/comments?id=".$item;?>> view post details</a></h6>
							</div>
							<div class="col-md-12" style="color: #98999f">
								<h6><i class="far fa-clock" style="font-size: 15px"></i> <?php echo $timeFormat; ?></h6>
							</div>
							
							<div class=" col-md-12" style="color: #98999f">
								<h6><i class="fas fa-user-tie" style="font-size:15px"></i> <?php echo $ret['by']; ?></h6>
							</div>
							<div class="col-md-12" style="color: #98999f">
								<h6><?php echo $ret['descendants']." ";?>
								<?php
								if ($ret['descendants']>0) {
								?>
								<a href=<?php echo "/views/comments?id=".$item;?>> <i class="fas fa-comments" style="font-size:15px" ></i></a></h6>
								
								<?php }else {?>
								<i class="fas fa-comments" style="font-size:15px"></i></h6>
								
								<?php }?>
								
								
							</div>
							
						</div>
						
					</div>
				</div>
			</div>



				
			   

								<?php } }
					
	
	}


}



?>

		<!-- pagination start -->
	<div class="row container-fluid">
		<nav style="">
  		<ul class="pagination pg-blue">
  		
    	<li class="page-item <?php if(!isset($_GET['page'])){echo "disabled" ;}?>">
     	 <a class="page-link" tabindex="-1" href=<?php echo "/views/".$pagePath."?page=".($_GET['page']+1) ; ?>>Previous</a>
   		 </li>
			<?php
				for ($i=1; $i <=9 ; $i++) { ?>

						<li class="page-item <?php if($i==$_GET['page']){ echo "active";} ?>"><a class="page-link " href=<?php echo "/views/".$pagePath."?page=".$i; ?>><?php echo $i; ?></a></li>


				<?php }
			?>
   		 
    	
    
    <li class="page-item">
      <a class="page-link" href=<?php echo "/views/".$pagePath."?page=".($_GET['page']+1) ;?>>Next</a>
    </li>
  </ul>
</nav>
	</div>
	<!-- pagination end -->
</div>
</div>
</div>

