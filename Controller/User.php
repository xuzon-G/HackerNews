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
	}
}



class User 
{
	public $conn;
	function __construct()
	{
		
	$servername = "localhost";
	$username = "root";
	$password = "just";
	$db="hackernews";
	$this->conn =  mysqli_connect($servername,$username,$password,$db);

// Check connection
	if ($this->conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
	}
	
	}

	

	public function registerUser($username,$email,$password)

	{
		$pwd=$this->helper($password);
		$query="Insert into tbl_user SET uname='".$username."',
											email='".$email."',
											password='".$pwd."'";
					
		
		if(mysqli_query($this->conn,$query))
		{
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
				echo "<pre>";
				print_r($data);
				echo "</pre>";
					if ($this->helper($password)==$data['password'] ) {
					echo "password matched";
				}
				else{
				echo "wrong password try again";
				}
			
			
		}
		
	

	}

	private function helper($password)
	{
		return hash("SHA256", $password);
	}
}

?>