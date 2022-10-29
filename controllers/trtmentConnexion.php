
<?php

/* démarrer les sessions */
session_start();

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
            $mdpConnect = htmlspecialchars(($_POST['mdpConnect']));

            //Affichage des données recupérées
            echo ("$mailConnect, $mdpConnect");

            //Vérification format du mail
            if (!filter_var($mailConnect, FILTER_VALIDATE_EMAIL)){
                $error = "email incorrect";
                include("../views/connexion.php");
                exit;
            }

            //Rechercher si user existe
            $chearch = $bd -> prepare('SELECT * FROM utilisateur WHERE mail = ?  ');
            $chearch -> execute(array($mailConnect));


            //insertion dans la base de données si l'utilsateur existe pas sinon msgErrors
            if ($chearch -> rowCount() > 0) {

                //afficher les users recupérer via id
                $infoUsers = $chearch -> fetch();

                //vérifier si le mdp entrer correspond au mdp hasher
                if (password_verify($mdpConnect, $infoUsers['mdp'])) {

                    //autentier user si less identifiants sont bonnes

                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $infoUsers['$id'];
                    $_SESSION['nom'] = $infoUsers['$nom'];
                    $_SESSION['prenom'] = $infoUsers['$prenom'];
        
                    //redirection de la personne connecter
                    header('location: ../views/admin.php');
                    exit; 
        
                    
                }else {
                    $msgErros ='Votre mot de passe est incorrecte !';
                }

            


                
            } else{
                $mailPris ='Le mail ne correspond pas à ce compte !';
                header('location: ../views/connexion.php');
                exit;

            }
        
            
        }else {
            $msgErros ='Ce chmaps est obligatoire !';
/*             header("location: ../views/connexion.php?success= $msgErrors;");
            exit;
             */
        }

    }
    
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
?>


