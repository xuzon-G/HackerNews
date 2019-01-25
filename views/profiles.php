<?php 

include_once('../Controller/UserDetail.php');
$username=$_GET['uname'];
$user=new UserDetail();
$data=$user->viewUserDetails($username);





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container" id="main" >
    <!-- profile section -->
<div class="row " style="margin-top:5%;">
   
            <div class="card " style="font-family: 'Exo 2', sans-serif;">
                <div  style="display: flex;flex-wrap: wrap;justify-content: center;align-items: center;flex-direction: column;">
                    <img  style="border-radius:50%;height:200px;width:200px" class="card-img-top img-responsive center" src="/assets/profilePic/<?php echo $data['profilePic']; ?>" alt="Card image cap">
                    <h1>Profile Details</h1>
                    <h2><b>User Name:</b> <?php echo $data['uname'];?></h2>
                    <h2><b>College:</b> <?php echo $data['college'];?></h2>

                    <h2> <b>Faculty:</b><?php echo $data['faculty'];?></h2>
                    <h2><b>Semester: </b><?php echo $data['semester'];?></h2>
                </div>
                 
                  </div>
    

</div> 
<!-- profile section ends -->


</div>
</body>
</html>