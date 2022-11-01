document.getElementById("inscription").addEventListener("submit", function(e){


    var errors ;
    var inputs = document.getElementsByTagName("input");
    var email = document.getElementById("mailInscript");  
    var mdpIncript = document.getElementById("mdpIncript");  
    var mdpConfirm = document.getElementById("mdpConfirm"); 


    for (let i = 0; i< inputs.length -1; i++) {
        if (!inputs[i].value.trim()) {
            errors = "les champs avec astérix sont obligatoire !";
            
        }
    }

    if (errors) {
        e.preventDefault();
        document.getElementById("errors").innerHTML = errors;
        return false;

    }
    else if (email.value.indexOf("@", 0) < 0)                 
    { 
        e.preventDefault();
        document.getElementById("mailValide").innerHTML = "Le mail est inavlide !";
        email.focus(); 
        return false; 
    }    
    else if (email.value.indexOf(".", 0) < 0)                 
    { 
        e.preventDefault();
        document.getElementById("mailValide").innerHTML = "Le mail est inavlide !"; 
        email.focus(); 
        return false; 
    } 
    else if (mdpConfirm != mdpIncript) {
        e.preventDefault();
        document.getElementById("mdp#").innerHTML = "Mots de passe non Identique !";
        return false;

    }
    else{
        document.getElementById("success").innerHTML = "connexion Réussie !";

    }

    return true; 
    


});


