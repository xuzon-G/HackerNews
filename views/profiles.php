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
<div class="container" id="main" style="width:40%">
    <!-- profile section -->
<div class="row " style="margin-top:5%;box-shadow:0px 0px 3px 3px #888;padding-top:5px;"  >
   
            <div class="card " style="font-family: 'Exo 2', sans-serif;">
                <div  style="display: flex;flex-wrap: wrap;justify-content: center;align-items: center;flex-direction: column;">
                    <img  style="border-radius:50%;height:150px;width:150px" class="card-img-top img-responsive center" src="/assets/profilePic/<?php echo $data['profilePic']; ?>" alt="Card image cap">
                    <h2>Profile Details</h2>
                    <h4><b>User Name:</b> <?php echo $data['uname'];?></h4>
                    <h4><b>College:</b> <?php echo $data['college'];?></h4>

                    <h4> <b>Faculty:</b><?php echo $data['faculty'];?></h4>
                    <h4><b>Semester: </b><?php echo $data['semester'];?></h4>
                </div>
                 
                  </div>
    

</div> 
<!-- profile section ends -->


</div>
</body>
</html>