<?php
    //sécurité
 /*    if(!isset($_SESSION['auth'])) {
        header("location: connexion.php");
        exit;
    } */
    include_once('../controllers/archivageBd.php');
    /* les inclusions boostrap */
    include('include.php');
        //sécurity
        include('security.php');
    
?>
    <div class="card" align="center" style="color: black ">
        <H4>Listes des archivés</H4>
    </div>
   <!-- bontton retour -->
 
    <br><br>
    <!-- barre de recherche -->
    <div class="container table-responsive-sm">
        <br>
        <div>
            <a href="user.php">retour</a>
        </div>
        <div  class="container search">
            <form class="search" action="" method="POST">
                <input type="search" id="search_emp_input" name="recherche" placeholder="recherche..." required  size=50>
                <input id="search_emp_button" type="submit" value="recherche" name="btnRecherche">
            </form>
        </div>
        <br>
        <br>
    <!-- /barre de recherche -->
    <!-- afficher les éléments de la bases dans un tab -->
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
    </table>