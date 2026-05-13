function valid_singup() {

    let name = document.getElementById("name");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    // vérifier name
    if(name.value == "") {
        name.style.borderColor="red"
        return false;
    }else{
         name.style.borderColor=""
    }
    // vérifier email
    let reg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(email.value == "") {
        email.style.borderColor="red"
        return false;
    }else if(!reg.test(email.value)) {
        email.style.borderColor="red"
        return false;
    }else{
        email.style.borderColor=""
    }
    // vérifier password
    if(password.value.length < 8){
    password.style.borderColor="red"
    return false;
    }else{
        password.style.borderColor=""
    }
    return true;
}
