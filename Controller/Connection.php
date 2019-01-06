	<?php	
	$servername = "localhost";
	$username = "root";
	$password = "just";
	$db="hackernews";
	$this->conn =  mysqli_connect($servername,$username,$password,$db);

// Check connection
	if ($this->conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
	}
	?>