<?php
//ilcusion bd
require_once('../config/bd.php');
//inclusion ficher traitement
include('../controllers/trtmntRecherche.php');

?>
<br>
<br>
<!-- afficher les éléments de recherche dans un tab -->

<table border="1px" class="table">
    <tr>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Rôle</th>
        <th>Actions</th>
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