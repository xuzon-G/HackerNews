<?php
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
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/assets/style.css">
	</head>
	<body>
		<div class="container-fluid" >
			<div class="row">
				<div class="col-md-12 " style="">
					<nav class="navbar navbar-inverse" style="
						box-shadow: 5px 10px 8px #888888;">
						<div class="container-fluid">
							<div class="navbar-header">
								<a class="navbar-brand" href="#">HackerNews</a>
							</div>
							<ul class="nav navbar-nav" style="float: right;margin-right: 20px">
								<li class=<?php if ($path=="home"||$path=="views") { echo "active";}?>><a href="/views/home">Home</a></li>
								<li class=<?php if ($path=="job") { echo "active";}else{ echo "";}?>><a href="/views/job">Job</a></li>
								<li class=<?php if ($path=="ask") { echo "active";}else{ echo "";}?>><a href="/views/ask">Ask</a></li>
							</ul>
						</div>
					</nav>
				</div>
				
			</div>

			
		</div>
		
	</body>
</html>