function validateForm()
{

var uname=document.getElementById('cuname').value;
var password=document.getElementById('cpwd').value;
var confirmpwd=document.getElementById('cfmpwd').value;
var semester=document.getElementById('semester').value;
var college=document.getElementById('college').value;


if(!isNaN((uname)))
{
var err_uname=document.getElementById('err_uname');
 err_uname.innerText="Username should not be number";
 err_uname.classList.add("text-danger");
 return false;
}
else if(password!=confirmpwd)
{var err_pwd=document.getElementById('err_pwd');
    err_pwd.innerText="Confirm password doesnot match with password";
    err_pwd.classList.add("text-danger");
    return false;
}else if(!semester)
{
  var  err_semester=document.getElementById('err_semester');
    err_semester.innerText=" You must select your Semester";
    return false;
}else if(!isNaN((college)))
{
    var err_college=document.getElementById('err_college');
    err_college.innerText="College name should not be number";
 
}
else{
    return true;
}


}