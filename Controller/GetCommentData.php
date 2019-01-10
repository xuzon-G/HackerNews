<?php
/**
 * 
 */
class CommentData 
{
	public $conn;
	function __construct()
	{
		include 'Connection.php';
	}

	public function getData($hid)
	{
		$data = array();
		$query="SELECT tbl_comment.* ,tbl_user.uname FROM hackernews.tbl_comment,hackernews.tbl_user where tbl_comment.uid=tbl_user.id && tbl_comment.hid=".$hid;

		$result=mysqli_query($this->conn,$query);
		$i=0;
	while($row = mysqli_fetch_assoc($result))
	{ 
			$data[$i]=$row;
			$i++;
		
			
		
	}
		return $data;
	}

	public function countComment($hid)
	{
			$data = array();
		$query="SELECT tbl_comment.* ,tbl_user.uname FROM hackernews.tbl_comment,hackernews.tbl_user where tbl_comment.uid=tbl_user.id && tbl_comment.hid=".$hid;

		$result=mysqli_query($this->conn,$query);
		 return mysqli_num_rows($result);
	}
}

?>
