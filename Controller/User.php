<?php

/**
 * 
 */

if (isset($_POST['user'])) {
	$user=new User();
	$userInfo=$_POST['user'];
	switch ($userInfo) {
		case 'Login':
			$user->loginUser($_POST['uname'],$_POST['password']);
			break;
		
		case 'Create':
			$user->registerUser($_POST['uname'],$_POST['email'],$_POST['password']);
			break;

		case 'Comment':
			$user->commentUser($_POST['uname'],$_POST['cmt'],$_POST['hid'],$_POST['redirect_path']);
				break;

		case 'asmtComment':
	
		$user->asmtComment($_POST['uname'],$_POST['cmt'],$_POST['hid']);
		break;

		case 'Post':
				if (($_FILES['UploadImage']['size']!=0)){
				$user->imagePost($_POST['uname'],$_POST['postDetail'],$_FILES);	
				}
				
				else{ 
				 $user->userPost($_POST['uname'],$_POST['postDetail']);
				}
		
	}
}



class User 
{
	public $conn;
	function __construct()
	{
		include 'Connection.php';
	
	}

	

	public function registerUser($username,$email,$password)

	{
		$pwd=$this->helper($password);
		$query="Insert into tbl_user SET uname='".$username."',
											email='".$email."',
											password='".$pwd."'";
					
		
		if(mysqli_query($this->conn,$query))
		{
			$_SESSION['user']=$username;
			header('Location:/views');

		}else
		{
			echo "insert failed";
		}

	

	}


	public function loginUser($username, $password)
	{     
			
			 $query="Select * from tbl_user where uname='".$username."'";
		
			$result=mysqli_query($this->conn,$query);
			if (mysqli_num_rows($result)>0) {
				$data=mysqli_fetch_assoc($result);
					if ($this->helper($password)==$data['password'] ) {
					session_start();
					$_SESSION['user']=$username;
					

					header('location:/views/home');
					
				}
				else{
				echo "wrong password try again";

				}
			
			
		}
		
	

	}
	public function commentUser($uname,$cmt,$hid,$back)
	{
		
			 $query="Select id from tbl_user where uname='".$uname."'";

		
			$result=mysqli_query($this->conn,$query);
			$data=mysqli_fetch_assoc($result);
		
			$uid=$data['id'];
 

			$queryCmt="Insert into tbl_comment SET uid='".$uid."',
											hid='".$hid."',
											created_at=".Time().",
											data='".$cmt."'";

			if(mysqli_query($this->conn,$queryCmt))
		{
			header("location:".$back);
		}else
		{
			echo "insert failed";
		}

	}

	public function userPost($uname,$post)
	{
		
		$query="Insert into tbl_post SET uname='".$uname."',
											created_at=".Time().",
											post='".$post."'";
											
											
					
		
		if(mysqli_query($this->conn,$query))
		{
			header('Location:/views/Asmt');
		}else
		{
			echo "insert failed";
		}

	}
		public function imagePost($uname,$post,$file)
	{
		if ($this->checkImage($file)) {
			$path='../assets/';
			
			$newfilename= date('dmYHis');
			$ext = pathinfo($file['UploadImage']['name'], PATHINFO_EXTENSION);
			$newfilename=$newfilename.".".$ext;
		
		

			move_uploaded_file($file["UploadImage"]["tmp_name"], $path.$newfilename);

			$query="Insert into tbl_post SET uname='".$uname."',
											created_at=".Time().",
											image='".$newfilename."',
											post='".$post."'";

											
						
											
					
		
		if(mysqli_query($this->conn,$query))
		{
			header('Location:/views/Asmt');
		}else
		{
			echo "insert failed";
		}
		}
	}



	public function viewUserPost()
	{
				$queryPost="Select *from tbl_post ";
				$result=mysqli_query($this->conn,$queryPost);
					$i=0;
			while($row = mysqli_fetch_assoc($result))
			{ 
					$data[$i]=$row;
					$i++;
				
					
				
			}
				
				return ($data);
			
			
	}



public function asmtComment($uname,$cmt,$hid)
	{
		
			 $query="Select id from tbl_user where uname='".$uname."'";

		
			$result=mysqli_query($this->conn,$query);
			$data=mysqli_fetch_assoc($result);
		
			$uid=$data['id'];
 

			$queryCmt="Insert into tbl_comment SET uid='".$uid."',
											hid='".$hid."',
											created_at=".Time().",
											data='".$cmt."'";

			if(mysqli_query($this->conn,$queryCmt))
		{
			header("location:/views/Asmt?post=".($hid));
		}else
		{
			echo "insert failed";
		}

	}


	private function helper($password)
	{
		return hash("SHA256", $password);
	}


	public function checkImage($file)
	{
			$allowed =  array('gif','png' ,'jpg');
			$filename = $_FILES['UploadImage']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);

			if(!in_array($ext,$allowed) ) {
 			   echo 'Please  upload images only';
				}else
				return true;

	}
}



?>