function stlogin(){
    var user = document.getElementById("username");
    var pass = document.getElementById("password");
    if(user.value != "TPO" || pass.value !="tpo123"){
        window.alert("Invalid credentials !!");
        return false;
    }   
    else {
        true;
    }