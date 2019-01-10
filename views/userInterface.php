<?php
session_start();
$route = $_SERVER["REQUEST_URI"];
$route = explode("/",$route);
foreach (  $route as $value) {
	$path=$value;
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
	
		<link rel="stylesheet" type="text/css" href="/assets/style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous"></script>

			<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	
		

	</head>
	<body>
			<div class="container-fluid" >
			<div class="row">
				<div class="col-md-12 " style="">
					<nav class="navbar navbar-inverse" style="
						box-shadow: 0px 0px 8px #888888;">
						<div class="container-fluid">
							<div class="navbar-header">
								  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        							<span class="icon-bar"></span>
        							<span class="icon-bar"></span>
       								 <span class="icon-bar"></span>
    								  </button>
								<a class="navbar-brand" href="#">HackerNews</a>
							</div>
							 <div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav" style="float: right ;margin-right: 30px" >
								<li class=<?php if ($path=="home"||$path=="views") { echo "active";}?>><a href="/views/home">Home</a></li>
								<li class=<?php if ($path=="job") { echo "active";}else{ echo "";}?>><a href="/views/job">Job</a></li>
								<li class=<?php if ($path=="ask") { echo "active";}else{ echo "";}?>><a href="/views/ask">Ask</a></li>
								<li class=<?php if ($path=="shows") { echo "active";}else{ echo "";}?>><a href="/views/shows">Show</a></li>
								<li class=<?php if ($path=="Asmt") { echo "active";}else{ echo "";}?>><a href="/views/Asmt">ASMT</a></li>
								
								<li class="login">

									<?php if(isset($_SESSION['user']))
									{ 
										
										
								 		?>
										 
									    <a href="" class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color: white"><?php echo $_SESSION['user'];?>
									    <span class="caret"></span></a>
									    <ul class="dropdown-menu">
									      <li><a href="/views/logout.php">Logout <i class="fas fa-sign-out-alt"></i></a></li>
									   
									    </ul>
								
									<?php } else{?>


								 <a href="/views/login">Login<i class="fas fa-sign-in-alt"></i></a> 
							<?php } ?>
							</li>
							</ul>
						</div>
						</div>
					</nav>
				</div>
				
			</div>

			
	
			 
		


		
		
