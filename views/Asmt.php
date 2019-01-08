<?php
session_start();
?>

<div class="container" style="width: 80%">
	<div class="row">
			        <form class="form" role="form" method="post" action=<?php if (isset($_SESSION['user'])){
                        echo "/Controller/User.php";
                    }else { echo "/views/login";} ?> >
			      
			        	
            <div class="form-group">
                   <textarea class="form-control" rows="3" id="comment" placeholder="POST YOUR THOUGHTS" name="postDetail" required=""></textarea>
                    <input type="hidden" name="uname" value=<?php echo $_SESSION['user'];?>>
                    <div class="co-md-12"> <input type="submit" class="btn btn-default" name="user" value="Post"  style="float: right"><div>
             </div>
                    
            
        
                
        </form>
    </div>
</div>