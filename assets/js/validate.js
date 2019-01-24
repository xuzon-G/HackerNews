function validateForm()
{

var uname=document.getElementById('cuname').value;
var password=document.getElementById('cpwd').value;
var confirmpwd=document.getElementById('cfmpwd').value;
if(!uname)
{
var err_uname=document.getElementById('err_uname');
 err_uname.innerText="Username should not be empty";
 err_uname.classList.add("text-danger");
 return false;
}
else if(password!=confirmpwd)
{var err_pwd=document.getElementById('err_pwd');
    err_pwd.innerText="Confirm password doesnot match with password";
    err_pwd.classList.add("text-danger");
    return false;
}
else{
    return true;
}


}