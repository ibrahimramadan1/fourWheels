function checkNewAdmins(){
    var x= document.getElementsByName("Aname[]");
    var y= document.getElementsByName("Auser[]");
    var e= document.getElementsByName("Aemail[]");
    var z= document.getElementsByName("Apassword[]");
    var name;
    for (var i=0;i<x.length;i++){
        name=x[i].value;
        if (name.length==0){
            alert("missing name input!");
            return false;
        }
    }

    for (var i=0;i<y.length;i++){
        name=y[i].value;
        if (name.length==0){
            alert("missing username input!");
            return false;
        }
    }

    for (var i=0;i<e.length;i++){
        name=e[i].value;
        if (name.length==0){
            alert("missing email input!");
            return false;
        }
    }

    for (var i=0;i<z.length;i++){
        name=z[i].value;
        if (name.length==0){
            alert("missing password input!");
            return false;
        }
    }

    return true;
}