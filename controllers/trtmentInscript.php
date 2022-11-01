<?php

/* démarrer les sessions */



/**
 *  inclusion du fichier e connxion à la bd 
*/
require_once("../config/bd.php");


//Traiement du formulaire d'inscrion
if (isset($_POST['btnInscript'])) {

    //vérifier si les champs sont actionné
    if (isset($_POST['nom'])  && isset($_POST['prenom']) && isset($_POST['mailInscript']) && isset($_POST['role']) && isset($_POST['mdpInscript'])) {
        //Vérification  contenus des champs de saisies
        if (!empty($_POST['nom'])  && !empty($_POST['prenom']) && !empty($_POST['mailInscript']) && !empty($_POST['role']) && !empty($_POST['mdpInscript'])) {
            
            $nom = htmlspecialchars($_POST['nom']) ;
            $prenom = htmlspecialchars($_POST['prenom']) ;
            $mailInscript = htmlspecialchars($_POST['mailInscript']);
            $role = htmlspecialchars($_POST['role']);
            $mdpInscript = password_hash($_POST['mdpInscript'], PASSWORD_DEFAULT);
           /*  $confirmMdp = ($_POST['confirmMdp']) */;
            $photo = htmlspecialchars($_POST['photo']);

            //afficher les données recuperer
            echo("$nom, $prenom, $mailInscript, $role, $mdpInscript, $photo");


             //Vérification format du mail
             if (!filter_var($mailInscript, FILTER_VALIDATE_EMAIL)){
                $error = "email incorrect";
                include("../views/connexion.php");
                exit;
            }


            //Rechercher si user existe
            $chearch = $bd -> prepare('SELECT * FROM utilisateur WHERE mail = ?  ');
            $chearch -> execute(array($mailInscript));


            //insertion dans la base de données si l'utilsateur existe pas sinon msgErrors
            if ($chearch -> rowCount() == 0) {


           //Inscertion à partir du formulaire dans la base
            /* $insert = ("INSERT INTO users(nom, prenom, mail, roles, mdp) VALUES($nom, $prenom, $mail,$role, $mdp) "); */
            $insert = $bd->prepare("INSERT INTO utilisateur(nom, prenom, mail, roles, mdp,photo) VALUES(?,?,?,?,?,?) ");
            //execution de la requette insertion
            $insert->execute(array($nom, $prenom, $mailInscript, $role, $mdpInscript,$photo));

            //Auto incrémenté le matricule
                $matricule = "A0-" . $bd -> lastInsertId();
                $mat = ("UPDATE utilisateur SET matricule = '$matricule' WHERE mail = '$mdpInscript'");
                $modifMat = $bd -> prepare ($mat) ;
                $modifMat -> execute();
          




                        

            //Recupérer les infos utilisateurs connecter
            $infoId = $bd -> prepare('SELECT id, nom prenom, mail, roles FROM utilisateur WHERE nom = ? AND prenom = ? AND mail = ? AND roles = ?');
            $infoId -> execute(array($nom, $prenom, $mailInscript, $role ));

            //afficher les users recupérer via id
            $infoUsers = $infoId -> fetch();

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $infoUsers['$id'];
            $_SESSION['nom'] = $infoUsers['$nom'];
            $_SESSION['prenom'] = $infoUsers['$prenom'];
            $_SESSION['mail'] = $infoUsers['$mail'];
            $_SESSION['roles'] = $infoUsers['$roles'];

            //redirection de la personne connecter
            header('location: ../views/connexion.php');
            exit; 


            } else{
                $mailPris = 'Le mail existe déja !';
                header('location: ../views/inscription.php');
                exit;

            }
            
            
         



        }else {
            $msgErrors= "Ce champs est obligatoire !";
        }
    }
}



?>