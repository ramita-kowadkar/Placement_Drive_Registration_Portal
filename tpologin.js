function login(){
    var user = document.getElementById("user");
    var pass = document.getElementById("pass");
    if(user.value != "TPO" || pass.value !="tpo123"){
        window.alert("Invalid credentials !!");
        return false;
    }   
    else {
        true;
    }
}


    
