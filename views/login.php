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
                  <li id="createTab" class=<?php if($_GET['errid']){echo "";}else{echo "active";} ?> ><a href="#login" data-toggle="tab">Login</a></li>
                  <li id="loginTab" class=<?php if($_GET['errid']){echo "active";}?>><a href="#create" data-toggle="tab">Create Account</a></li>
                   
                    
                  </ul>
                  <div id="myTabContent" class="tab-content">

                    <div class="tab-pane " id="login" style="margin-top: 10px">
                          <form action="/Controller/User.php" method="POST" >
                        <div class="form-group">
                          <label for="username">Username:</label>
                          <input type="text" class="form-control" id="uname" name="uname">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" name="password">
                        </div>
                        <p class="text-danger"><?php if($_GET['err']) {echo "Username or password do not matched";}?></p>
                        <div class="checkbox">
                          <label><input type="checkbox"> Remember me</label>
                        </div>
                        <input type="submit" class="btn btn-default" value="Login" name="user">
                        </form> 
                    </div>
                    <div class="tab-pane <?php if($_GET['errid']){echo "active in";}else{echo "fade";}?>" id="create" style="margin-top: 10px">
                       <form action="/Controller/User.php" id="tab" method="POST" onsubmit="return validateForm();">
                        <div class="form-group">
                          <label for="Username">Username:</label>
                          <input type="text" class="form-control" id="cuname" name="uname">
                          <p id="err_uname" class="text-danger"> <?php if($_GET['errid']==2){echo "Username already exist";} ?></p>
                        </div>
                        <div class="form-group">
                          <label for="email">Email:</label>
                          <input type="email" class="form-control" id="cemail" name="email">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="cpwd" name="password">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Confirm Password:</label>
                          <input type="password" class="form-control" id="cfmpwd" name="password">
                          <p id="err_pwd" class=""></p>
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
<script src="/assets/js/validate.js"></script>
