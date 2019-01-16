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
			<link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Press+Start+2P|Zilla+Slab" rel="stylesheet"> 
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.css
">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js" ></script>
						
	
		<meta charset="utf-8">

	</head>
	<body >
			<div class="container-fluid" >
			<div class="row">
				<div class="col-md-12 " >
					<nav class="navbar navbar-inverse" style="
						box-shadow: 0px 0px 8px #888888;">
						<div class="container-fluid">
							<div class="navbar-header"style="font-family: 'Press Start 2P', cursive;">
								  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        							<span class="icon-bar"></span>
        							<span class="icon-bar"></span>
       								 <span class="icon-bar"></span>
    								  </button>
								<a class="navbar-brand" href="#" ">Tech-News</a>
							</div>
							 <div class="collapse navbar-collapse" id="myNavbar" style="font-family: 'Black Ops One', cursive;">
							<ul class="nav navbar-nav" style="float: right ;margin-right: 30px" >

								<li class=<?php if ($path=="Asmt"||$path=="views") { echo "active";}else{ echo "";}?>><a href="/views/Asmt"><i class="fas fa-graduation-cap"></i> ASMT </a></li>
								<li class=<?php if ($path=="feed") { echo "active";}?>><a href="/views/newsfeed"><i class="fab fa-hacker-news-square"></i> News Feed</a></li>
								<li class=<?php if ($path=="job") { echo "active";}else{ echo "";}?>><a href="/views/job"><i class="fas fa-briefcase"></i> Job </a></li>
								
								
								<li class="login">

									<?php if(isset($_SESSION['user']))
									{ 
										
										
								 		?>
										 
									  <!--  <a href="" class=" dropdown-toggle" type="button" data-toggle="dropdown" style="color: white"><?php echo $_SESSION['user'];?>
									    <span class="caret"></span></a>
									    <ul class="dropdown-menu">
									      <li><a href="/views/logout.php">Logout <i class="fas fa-sign-out-alt"></i></a></li>
									   
									    </ul> -->
									   
  				<a class="dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" style="color: white"><i class="fas fa-user-circle"></i>

		 			<?php echo $_SESSION['user'];?> <span class="caret"></span></a>
 			

							  <ul class="dropdown-menu">
    
   
									      <li ><a href="/views/logout.php">Logout <i class="fas fa-sign-out-alt"></i></a></li>
									   
									
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

			
	
			 
		


		
		
