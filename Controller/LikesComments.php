<?php

/**
 * 
 */
if(isset($_REQUEST['pid'])) {
	$like=new LikesComments();
	$like->likePost($_REQUEST['uname'],$_REQUEST['pid'],$_REQUEST['from']);

}
class LikesComments 
{
		public $conn;
	
	function __construct()
	{
		include 'Connection.php';
	}

	public function likePost($uname,$pid,$from)
	{


		$check="Select * from tbl_likes where pid='".$pid."' && 
												uname='".$uname."'";
		
		$result=mysqli_query($this->conn,$check);
		echo $check;
		echo mysqli_num_rows($result);
		
	    if(mysqli_num_rows($result)==0)
	    {
	    		$like="Insert into tbl_likes set pid=".$pid.", 
												uname='".$uname."'";	


			 mysqli_query($this->conn,$like);
			 if ($from=='main')
			 	header("location:/views/Asmt");
			 else
			 	header('location:/views/Asmt?post='.$pid);
			
			 
	    }else
	    {  
	    	$unlike="Delete from tbl_likes where pid=".$pid." && 
												uname='".$uname."'";
												echo $unlike;
											
	    	mysqli_query($this->conn,$unlike);
	    	 if ($from=='main')
			 	header("location:/views/Asmt");
			 else
			 	header('location:/views/Asmt?post='.$pid);
	    }


	
	}

	public function getLikes($pid)
	{
		$check="Select * from tbl_likes where pid=".$pid;
		$result=mysqli_query($this->conn,$check);
		echo mysqli_num_rows($result);

	}

}
?>