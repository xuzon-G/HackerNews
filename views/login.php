<?php
session_start();
if (isset($_SESSION['user'])) {
 header('location:/views/home');
 }
 else { 
?>

<div class="container">
  <div class="row">
        <div class="span12">
        <div class="" id="loginModal">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>Have an Account?</h3>
              </div>
              <div class="modal-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                    <li><a href="#create" data-toggle="tab">Create Account</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">

                    <div class="tab-pane active in" id="login" style="margin-top: 10px">
                          <form action="/Controller/User.php" method="POST" >
                        <div class="form-group">
                          <label for="username">Username:</label>
                          <input type="text" class="form-control" id="uname" name="uname">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" name="password">
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox"> Remember me</label>
                        </div>
                        <input type="submit" class="btn btn-default" value="Login" name="user">
                        </form> 
                    </div>
                    <div class="tab-pane fade" id="create" style="margin-top: 10px">
                       <form action="/Controller/User.php" id="tab" method="POST">
                        <div class="form-group">
                          <label for="Username">Username:</label>
                          <input type="text" class="form-control" id="uanme" name="uname">
                        </div>
                        <div class="form-group">
                          <label for="email">Email:</label>
                          <input type="email" class="form-control" id="pwd" name="email">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" name="password">
                        </div>
                       
                        <input type="submit" class="btn btn-default" name="user" value="Create">
                        </form> 
                    </div>
                </div>
              </div>
            </div>
        </div>
  </div>
</div>

<?php }?>