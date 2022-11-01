<?php
/* inclusion bd */




//Function récupération tous les utilisateurs
function getUsers(){
    include('../config/bd.php');
    $requete = ("SELECT * FROM utilisateur ");
    $rows = $bd -> query($requete);
    return $rows;

}

//Function créer un utilisateur
function CreateUser($nom, $prenom, $mail, $roles, $mdp){
    include('../config/bd.php');
    $insert = ("INSERT INTO utilisateur (nom, prenom, mail, roles, mdp) VALUE ($nom, $prenom, $mail, $roles, $mdp) ");
    $execInsert -> query($insert);
    return $execInsert;
      
  
}

//Function supprimer un utilisateur
function readUsers($id){
    include('../config/bd.php');
    $requete = ("SELECT * FROM utilisateur WHERE id = '$id' ");
    $stmt = $bd -> query($requete);
    $rows = $stmt -> fetchALL();
    if (!empty($rows)) {
        return $rows[0];
    }


}

//Function mettre à jour un utilisateur
function updateUsers($id, $nom, $prenom, $mail, $roles, $mdp){
    include('../config/bd.php');
    $modif = "UDATE utilisateur SET
        nom = '$nom',
        prenom = '$prenom',
        mail = '$mail';
        roles = '$roles',
        mdp = '$mdp';
        WHERE id = '$id' "; 
    $execUpadate = $bd -> query($modif); 

}

//Function supprimer un utilisateur
function deleteUsers($id){
    include('../config/bd.php');
    $delete = ("DELETE FROM utilisateur WHERE id = '$id'");
    $execDelete = $bd -> query($delete);
    return $execDelete;  

}


//afficher données 

function tableAffiche($rows){
    ?>

    <br><br>
    <div class="container">

    <table border="1px" class="table">
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Rôle</th>
        </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
</table>
</div>
 <?php   
}



?>