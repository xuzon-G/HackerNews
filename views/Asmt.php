<?php
session_start();
include('timeConvert.php');
include('../Controller/User.php');
include('../Controller/GetCommentData.php');
include('../Controller/LikesComments.php');

$like=new LikesComments();
$post=new User();
$viewPost=array_reverse(  $post->viewUserpost());

$i=1;
$comment=new CommentData();

?>

<div class="container" style="width: 60%;height: 650px;overflow: scroll"  >
    <div class="col-md-12 container">
	<div class="row" style="border:1px solid ">
			        <form class="form"  enctype="multipart/form-data" method="post" action=<?php if (isset($_SESSION['user'])){
                        echo htmlspecialchars('/Controller/User.php');
                    }else { echo "/views/login";} ?> >
			      
			        	
            <div class="form-group">
              <div class="row">


                <div class="col-md-12">
                      <textarea id="postText" class="form-control" rows="3" id="comment" placeholder="POST YOUR THOUGHTS" name="postDetail" required=""></textarea> 
                </div>


                <div class="col-md-12" style="margin-top:5px">
                    <div class="col-md-4"><label>Upload Image:</label><input type="file" name="UploadImage" id="fileToUpload">    </div>
                    <div class="col-md-8">
                          <input type="hidden" name="uname" style="display: none" value=<?php echo $_SESSION['user']; ?>>
                    <input type="submit" class="btn " name="user" value="Post"  style="float: right;background-color:#222;color:white; ">
                    </div>
                      
                  
                </div>
                  </div>


             </div>
          
                    
            
        
                
        </form>

    </div>
    <div class="row">
        <hr>
    </div>

<?php foreach ($viewPost as $key => $post) {

    if ($key==0) {
        $margintop="5px";
    }
    ?>

   
     <div class="panel panel-default row" style="margin-top: <?php echo $margintop;?>">
   
    <div class="panel-body">
        
         

<!-- This is image section-->
<?php
if ($post['image']) {?>
    <div class="col-md-12">
    <div class="col-md-12">
           <h4>  <?php echo $post['post'];?>   </h4>
    </div>
        <div class="col-md-12" style="width:100%;">
            <img src=<?php echo "../assets/images".$post['image'];?> class="img img-responsive">
        </div>
    </div>

<?php }else{?>
   <h4>  <?php echo strip_tags($post['post']);?>   </h4>
<?php }?>

<!-- image section ends -->




     
    </div>
    <div class="panel-footer col-md-12">
                  <div class="col-md-1">
                 <h5>  <a href=<?php
                    if (isset($_SESSION['user'])) {
                       echo "/Controller/LikesComments.php?uname=".$_SESSION['user']."&&pid=".$post['pid']."&&from=main";
                    }else
                    {
                       echo "/views/login"; 
                    }
                   ?>  

                 style="color:black;text-decoration: none"> <i class="fas fa-thumbs-up" style="size: 20px"></i></a> <?php $like->getLikes($post['pid']); ?> </h5>
                </div>
            
                <div class="col-md-2"> <h6><i class="far fa-clock" style="font-size: 15px"></i> <?php echo TimeConvert::get_time_ago($post['created_at']); ?></h6>
                           </div>
                <div class="col-md-2">
                     <h6><i class="fas fa-user-tie" style="font-size:15px"></i> <?php echo $post['uname']; ?></h6>
                </div>
            
                  <div class="col-md-2">
                  <a style="color:black;text-decoration: none" href="" id="cmt_link_<?php echo $post['pid']; ?>" data-toggle="modal" data-target="#cmtModal<?php echo $post['pid']; ?>"><h6>
                    <?php echo $comment->countComment($post['pid']); ?>
                    <i class="fas fa-comments" style="font-size:15px"></i> Comment</h6></a> 
              </div>
      <div class="row">
      <hr>
  </div>

<!-- Modal -->
<div class="modal fade" id="cmtModal<?php echo $post['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="max-height:800px">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <div class="col-md-12">  
         <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="col-md-12">
             
                        <?php
                        if ($post['image']) {?>
                            <div class="col-md-12" >
                            <div class="col-md-12">
                                   <h4>  <?php echo $post['post'];?>   </h4>
                            </div>
                                <div class="col-md-12" >
                                    <img src=<?php echo "../assets/".$post['image'];?> class="img img-responsive" >
                                </div>
                            </div>

                        <?php }else{?>
                           <h4>  <?php echo $post['post'];?>   </h4>
                        <?php }?>
        </div>
       
     
      </div>
   
   
      <div class="modal-body row">
           <div class="col-md-2">
              <h5>  <a href=<?php
                    if (isset($_SESSION['user'])) {
                       echo "/Controller/LikesComments.php?uname=".$_SESSION['user']."&&pid=".$post['pid']."&&from=modal";
                    }else
                    {
                       echo "/views/login"; 
                    }
                   ?>  

                 style="color:black;text-decoration: none"> <i class="fas fa-thumbs-up" style="size: 20px"></i></a> <?php $like->getLikes($post['pid']); ?> </h5>
                </div>
         <div class="col-md-3"> <h6><i class="far fa-clock" style="font-size: 15px"></i> <?php echo TimeConvert::get_time_ago($post['created_at']); ?></h6>
                           </div>
                <div class="col-md-3">
                     <h6><i class="fas fa-user-tie" style="font-size:15px"></i> <?php echo $post['uname']; ?></h6>
                </div>         
                  <div class="col-md-3">
                  <h6>    <?php echo $comment->countComment($post['pid']); ?> <i class="fas fa-comments" style="font-size:15px"></i> Comment</h6>
              </div>

              <div class="col-md-12">
                

                  <form class="form" role="form" method="post" action=<?php if (isset($_SESSION['user'])){
                        echo "/Controller/User.php";
                    }else { echo "/views/login";} ?> >
                  
                        
            <div class="form-group">
                   <textarea class="form-control" rows="2" id="comment" placeholder="your Comment" name="cmt" required=""></textarea>
                    <input type="hidden" name="uname" value=<?php echo $_SESSION['user'];?>>
                    <input type="hidden" name="hid" value=<?php echo $post['pid']?>>


                    <div class="co-md-2  col-md-offset-10" style="margin-top: 5px"> <button type="submit" class="btn " name="user" value="asmtComment"  style="background-color:#222;color:white; ">Comment</button>
                    </div>


             </div>
          
            </form>



              </div>
       <?php $cmt=array_reverse($comment->getData($post['pid']));?>
        <div class="container col-md-12 "  data-spy="scroll" style="background-color: #f5f5f5;margin-top: 5px;max-height:<?php if ($cmt) {
            echo "200px;";
        }else{ echo "0px"; }?>;min-height:0px;overflow: scroll;" >
                    
                         <?php foreach ($cmt as $key => $data) {
                        ?>
       
              
                <div class="col-md-12" >
                <b><?php echo TimeConvert::get_time_ago($data['created_at'])." ".$data['uname'];?></b></br> 
                </div>
                <div class="col-md-12">
                <p style="padding-left: 20px"><?php echo $data['data']; ?> </p>   
                </div>
           
            <?php }?>
       </div>
   </div>

     


    </div>
  </div>
</div>
                                
             
    </div>
  </div>




   <?php $i++;} ?>
</div>
</div>

  <?php
    if(isset($_REQUEST['post']))
    {
        echo "<script> document.getElementById('cmt_link_".$_REQUEST['post']."').click() </script>";
    }
  ?>
<script type="text/javascript">
    

$("#postText").emojioneArea({
    pickerPosition:"bottom"
});


</script>