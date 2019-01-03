 <?php
$servername = "localhost";
$username = "root";
$password = "just";
$db="hackernews";

// Create connection
$conn =  mysqli_connect($servername,$username,$password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
$query="SELECT * FROM tbl_user";
$exe=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($exe);
print_r($row);

?> 