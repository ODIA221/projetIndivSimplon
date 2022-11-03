<?php
    //sécurité
/*     if(!isset($_SESSION['auth'])) {
        header("location: connexion.php");
        exit;
    }
 */
//ilcusion bd
require_once('../config/bd.php');
//inclusion ficher traitement
/* include('../controllers/trtmntRecherche.php'); */

?>
<br>
<br>
<!-- afficher les éléments de recherche dans un tab -->

<!-- pour acceder aux donnees users dans la base -->
 <?php
        $inputs = $bd -> prepare('SELECT * FROM utilisateur  WHERE id = $id AND etat = 1 limit 10');
        $inputs -> execute();
        
        $row = $inputs -> fetchALL(PDO::FETCH_ASSOC);
        
    ?>
    <br>
 

<table border="1px" class="table">
    <tr>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Rôle</th>
    </tr>
<?php
if ($row) {
    foreach($row as $row)
    {
        ?>
        <div>
            <tr>
                <td><?= $row['matricule']; ?></td>
                <td><?= $row['nom']; ?></td>
                <td><?= $row['prenom']; ?></td>
                <td><?= $row['mail']; ?></td>
                <td><?= $row['roles']; ?></td> 
            </tr>
        <?php
    }                    
} else {
    echo "Aucune donnée n'a été trouvée";
    
    ?>
        <br>
        <br>
    <?php
    
}   

?>

<!-- /* bouton retour apres recherche */ -->
<br>
<a href="admin.php">Retour</a>
