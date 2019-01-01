?>
		
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
					
				}
			}
			else
			{
			
			}