<?php
class UserDetail 
{   public $conn;
    function __construct()
    {
        include_once('Connection.php');
    }

    function viewUserDetails($username)
    {
        $query="Select uname, email, semester, faculty ,profilePic,college  from tbl_user where uname='".$username."'";
        $result=mysqli_query($this->conn,$query);
        if($result){
            $found=mysqli_num_rows($result);
           if($found)
           {
                    $data=mysqli_fetch_assoc($result);
                    return $data;
           }else{
               echo "Cant find your profile details";
           }
        }else
        {
            echo "There is error";
        }
    }

}

?>