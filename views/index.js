document.getElementById("connexion").addEventListener("submit", function(e){


    var errors ;
    var inputs = document.getElementsByTagName("input");
    var email = document.getElementById("mailConnect");  
             


    for (let i = 0; i< inputs.length; i++) {
        if (!inputs[i].value.trim()) {
            errors = "les champs avec astérix sont obligatoire !";
            
        }
    }
    if (errors) {
        e.preventDefault();
        document.getElementById("errors").innerHTML = errors;
        return false;

    }

    if (email.value.indexOf("@", 0) < 0)                 
    { 
        e.preventDefault();
        document.getElementById("mailValide").innerHTML = "Le mail est inavlide !";
        email.focus(); 
        return false; 
    }    
    if (email.value.indexOf(".", 0) < 0)                 
    { 
        e.preventDefault();
        document.getElementById("mailValide").innerHTML = "Le mail est inavlide !"; 
        email.focus(); 
        return false; 
    }  
    if (errors) {
        e.preventDefault();
        document.getElementById("errors").innerHTML = errors;
        return false;

    }else{
        document.getElementById("success").innerHTML = "connexion Réussie !";

    }

    return true; 
    


});










