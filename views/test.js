document.getElementById("inscription").addEventListener("submit", function(e){



    var errors ;
    var inputs = document.getElementsByTagName("input");
    var email = document.getElementById("mailInscript");  
    var mdpInscript = document.getElementById("mdpInscript");  
    var mdpConfirm = document.getElementById("confirmMdp"); 


    for (let i = 0; i< inputs.length -1; i++) {
        if (!inputs[i].value.trim()) {
            errors = ("les champs avec astérix sont obligatoire !");
            
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
    else if (mdpInscript.value !== mdpConfirm.value) {
        e.preventDefault();
        document.getElementById("mdpDiferrent").innerHTML = "Mots de passe non Identique !";
        return false;

    }
    else{
        setTimeout(document.getElementById("success").innerHTML = "connexion Réussie !", 1000000);
        

    }

    return true; 
    


});


