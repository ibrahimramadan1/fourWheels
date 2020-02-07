function checkLogin(){
    var x= document.getElementsByName("Auser");
    var y= document.getElementsByName("Apassword");
    var userName=x[0].value;
    var pass=y[0].value;
    if (userName.length==0){
        alert ("missing user name!");
        return false;
    }
    else if (pass.length==0){
        alert ("missing password!");
        return false;
    }
    return true;
}