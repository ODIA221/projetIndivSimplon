
<?php

/**
 *  inclusion du fichier de connxion à la bd 
*/
require_once("../config/bd.php");


//Vérifier si le bouton connecter est actionné
if (isset($_POST['btnConnect'])) {
    //vérifier si les champs sont actionné
    if (isset($_POST['mailConnect']) && isset($_POST['mdpConnect'])) { 
        //Vérifier si les champs sont vides
        if (!empty($_POST['mailConnect']) && !empty($_POST['mdpConnect'])) {
        

            //recupération des données saisies
            $mailConnect = htmlspecialchars($_POST['mailConnect']);
            $mdpConnect = ($_POST['mdpConnect']);

            //Affichage des données recupérées
            echo ("$mailConnect, $mdpConnect");

            //Vérification format du mail
            if (!filter_var($mailConnect, FILTER_VALIDATE_EMAIL)){
                $error = "email incorrect";
                include("../views/connexion.php");
                exit;
            }

            //insertion dans la base de données
            $insert = $bd->prepare("INSERT INTO utilisateur(mail, mdp) VALUES(?,?) ");
            //execution de la requette insertion
            $insert->execute(array($mailConnect, $mdpConnect));
            
        
            
        }else {
            $msgErrors ='Ce chmaps est obligatoire !';
/*             header("location: ../views/connexion.php?success= $msgErrors;");
            exit;
             */
        }

    }
    
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
?>


