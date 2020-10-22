function validateLogin() {
    if (document.frmLogin.username.value == "") {
        alert("Please provide your username!");
        document.frmLogin.username.focus();
        document.frmLogin.username
        return false;
    }
    return (true);
}

function validateRegistration() {
    if (document.frmRegister.fname.value == "") {
        alert("Please provide your first name!");
        document.frmRegister.fname.focus();
        document.frmRegister.fname
        return false;
    }
    
    if (document.frmRegister.lname.value == "") {
        alert("Please provide your last name!");
        document.frmRegister.lname.focus();
        document.frmRegister.lname
        return false;
    }
    
    if (document.frmRegister.email.value == "") {
        alert("Please provide your email!");
        document.frmRegister.email.focus();
        document.frmRegister.email
        return false;
    }
    
    if (document.frmRegister.username.value == "") {
        alert("Please provide your username!");
        document.frmRegister.username.focus();
        document.frmRegister.username
        return false;
    }
    
    if (document.frmRegister.password.value == "") {
        alert("Please provide your password!");
        document.frmRegister.password.focus();
        document.frmRegister.password
        return false;
    }
    return (true);
}