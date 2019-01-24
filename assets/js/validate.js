function validateForm()
{

var uname=document.getElementById('cuname').value;
var password=document.getElementById('cpwd').value;
var confirmpwd=document.getElementById('cfmpwd').value;
var semester=document.getElementById('semester').value;
var faculty=document.getElementsByName('faculty');
alert(faculty);

if(!isNaN(( uname)))
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
    err_semester=document.getElementById('err_semester');
    err_semester.innerText=" You must select your Semester";
    return false;
}
else{
    return true;
}


}