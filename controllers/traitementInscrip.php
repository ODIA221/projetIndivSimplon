<?php



/**
 *  inclusion du fichier e connxion à la bd 
*/
require_once("../config/bd.php");

//Tableau des messages D'erreurs
/* $msgErrors =[]; */



//Traiement du formulaire d'inscrion
if (isset($_POST['btnInscript'])) {

    //vérifier si les champs sont actionné
    if (isset($_POST['nom'])  && isset($_POST['prenom']) && isset($_POST['mailInscrip']) && isset($_POST['role']) && isset($_POST['mdpInscrip']) && isset($_POST['confirmMdp'])) {
        //Vérification  contenus des champs de saisies
        if (!empty($_POST['nom'])  && !empty($_POST['prenom']) && !empty($_POST['mailInscrip']) && !empty($_POST['role']) && !empty($_POST['mdpInscrip']) && !empty($_POST['confirmMdp'])) {
            
            $nom = htmlspecialchars(trim($_POST['nom'])) ;
            $prenom = htmlspecialchars(trim($_POST['prenom'])) ;
            $mailInscrip = htmlspecialchars(trim($_POST['mailInscrip']));
            $role = htmlspecialchars(trim($_POST['role']));
            $mdpInscrip = password_hash($_POST['mdpInscrip'], PASSWORD_DEFAULT);
            $photo = htmlspecialchars($_POST['photo']);

            //gérer les spaces 
            trim($nom);
            trim($prenom);
            trim($mailInscrip);
            trim($role);
            trim($mdpInscrip);
            
            
            //Vérification format du mail
            if (!filter_var($mailInscrip, FILTER_VALIDATE_EMAIL)){
                $error = "email incorrect";
                include("../views/inscription.php");
                exit;
            }

            //afficher les données recuperer
            echo("$nom, $prenom, $mailInscrip, $role, $mdp");

            //Inscertion à partir du formulaire dans la base
            /* $insert = ("INSERT INTO users(nom, prenom, mail, roles, mdp) VALUES($nom, $prenom, $mail,$role, $mdp) "); */
            $insert = $bd->prepare("INSERT INTO utilisateur(nom, prenom, mail, roles, mdp,photo) VALUES(?,?,?,?,?,?) ");
            //execution de la requette insertion
            $insert->execute(array($nom, $prenom, $mailInscrip,$role, $mdpInscrip,$photo));
                        
        }else {
            $msgErrors= "Ce champs est obligatoire !";
        }
    }
}



?>