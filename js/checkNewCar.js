function checkNewCar(){
    var mark=document.getElementsByName("Cmark");
    var type=document.getElementsByName("Ctype");
    var seat=document.getElementsByName("Cseat");
    var capcity=document.getElementsByName("Ccapcity");
    var image=document.getElementsByName("Cimage");
    var desc=document.getElementsByName("Cdesc");
    var price=document.getElementsByName("Cprice");
    
    var checker=mark[0].value;
    if (checker.length==0){
        alert("mark is missed");
        return false;
    }
    else if (type[0].value.length==0){
        alert("type is missed");
        return false;
    }
    else if (seat[0].value.length==0){
        alert("number of seats is missed");
        return false;
    }
    else if (capcity[0].value.length==0){
        alert("Gas capcity is missed");
        return false;
    }

    else if (desc[0].value.length==0){
        alert("describtion is missed");
        return false;
    }

    else if (price[0].value.length==0){
        alert("price is missed");
        return false;
    }

    else{
        var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
    }
    return true;

}