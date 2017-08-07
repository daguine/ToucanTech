$(document).ready(function () {
    var password = $('#password');
    var confPassword = $('#confPassword');
    
    function validatePassword() {
        if (password.val() !== confPassword.val()) {
            confPassword.get(0).setCustomValidity("Passwords Don't Match");
        } else {
            confPassword.get(0).setCustomValidity('');
        }
    }
    
    $(password).change(function(){
        validatePassword();
    });
    
    $(confPassword).keyup(function(){
        validatePassword();;
    });
   
     
});

