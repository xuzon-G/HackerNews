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

                    <div class="tab-pane  <?php if($_GET['errid']){echo "fade";}else{echo "active in";}?>" id="login" style="margin-top: 10px">
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

                    <!-- This is register Section -->
                    <div class="tab-pane <?php if($_GET['errid']){echo "active in";}else{echo "fade";}?>" id="create" style="margin-top: 10px">
                       <form action="/Controller/User.php" id="tab" enctype="multipart/form-data" method="POST" onsubmit="return validateForm();">
                        <div class="form-group">
                          <label for="Username">Username:</label>
                          <input type="text" class="form-control" id="cuname" name="uname" required>
                          <p id="err_uname" class="text-danger"> <?php if($_GET['errid']==2){echo "Username already exist";} ?></p>
                        </div>
                        <div class="form-group">
                          <label for="email">Email:</label>
                          <input type="email" class="form-control" id="cemail" name="email" required="">
                        </div>
                        <p id="err_uname" class="text-danger"> <?php if($_GET['errid']==3){echo "Email already taken try with new email id";} ?></p>
                        
                        <div class="form-group">
                          <label for="faculty">Choose your Faculty: </label>
                          <label class="radio-inline">
                      <input type="radio" name="faculty" value="BCA" required>BCA
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="faculty" value="Bsc.CSIT">Bsc.CSIT
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="faculty" value="BIM">BIM
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="faculty" value="BBM">BBM
                    </label>
                        </div>
                        <p id="err_faculty" class="text-danger"> </p>

                        <div class="form-group">
                          <label for="semester">Choose your Semester:</label>
                         
                  <select name="Semester" id="semeter"required>
                  <option value="">Select</option>
                  <option value="first">First</option>
                  <option value="second">Second</option>
                  <option value="third">Third</option>
                  <option value="fourth">Fourth</option>
                  <option value="fifth">Fifth</option>
                  <option value="sixth">sixth</option>
                  <option value="seventh">Seventh</option>
                  <option value="eighth">Eighth</option>
                  </select>
                        </div>
                        <p id="err_semester" class="text-danger"> </p>

                        <div class="form-group">
                          <label for="pwd">Upload a profile pic:</label>
                          <input type="file" name="UploadProfile" id="UploadProfile" required>  
                        </div>

                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="cpwd" name="password" required>
                        </div>
                        <div class="form-group">
                          <label for="pwd">Confirm Password:</label>
                          <input type="password" class="form-control" id="cfmpwd" name="password" required>
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
