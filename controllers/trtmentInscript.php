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
            $photo = htmlspecialchars($_POST['photo']);

            //afficher les données recuperer
            echo("$nom, $prenom, $mailInscript, $role, $mdpInscript, $photo");
             //Vérification format du mail
             if (!filter_var($mailInscript, FILTER_VALIDATE_EMAIL)){
                $error = "email incorrect";
                include("../views/inscription.php");
                exit;
            }


            //Rechercher si user existe
            $chearch = $bd -> prepare('SELECT * FROM utilisateur WHERE mail = ?  ');
            $chearch -> execute(array($mailInscript));

            //insertion dans la base de données si l'utilsateur existe pas sinon msgErrors
            if ($chearch -> rowCount() == 0) {


           //Inscertion à partir du formulaire dans la base
            /* $insert = ("INSERT INTO users(nom, prenom, mail, roles, mdp) VALUES($nom, $prenom, $mail,$role, $mdp) "); */
            $insert = $bd->prepare("INSERT INTO utilisateur (nom, prenom, mail, roles, mdp,photo) VALUES(?,?,?,?,?,?) ");
            //execution de la requette insertion
            $insert->execute(array($nom, $prenom, $mailInscript, $role, $mdpInscript,$photo));

            //Auto incrémenté le matricule
            $matricule = "A0-" . $bd -> lastInsertId();
            $mat = ("UPDATE utilisateur SET matricule = '$matricule' WHERE mail = '$mailInscript'");
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
            $_SESSION['photo'] = $infoUsers['$photo'];

            //redirection de la personne connecter
            header('location: ../views/connexion.php');
            exit; 


/*              //insertion tofs profiles
                if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
                    $tailleMax = 2097152;
                    $extensionValid = array("jpg, jpg, pnp, gif");
                        if ($_FILES['photo']['size'] <= $tailleMax) {
                            $extensionUpload = strtolower(substr(strrchr($_FILES['photo'], '.'), 1));
                            if (in_array($extensionUpload, $extensionValid)) {
                                $chemin = "images/". $_SESSION['id']. "." .$extensionUpload ;

                                $deplacerVersServers = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);

                                if ($deplacerVersServers) {
                                    $update = $bd -> prepare("UPDATE utilisateur SET photo = :photo WHERE id = :id");
                                    $update = execute(array(
                                        'photo' => $_SESSION['id']. "." .$extensionUpload,
                                        'id' => $_SESSION['id']
                                    ));
                                    header("location: ../views/connexion.php");

                                }else {
                                    $msgErrors = "Erreur survenue lors de l'importation! Veuiller réessayer";
                                }
                            }else {
                                $msgErrors = "pgp, jpeg, jpg, gif sont les format accptés !";
                            }
                            
                        }else {
                            $msgErrors = "la taille de la photo ne peut pas dépasser 2Mo";
                        }
                }
                //fin insertion tofs profiles */



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