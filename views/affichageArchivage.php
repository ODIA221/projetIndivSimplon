<?php
    //sécurité
 /*    if(!isset($_SESSION['auth'])) {
        header("location: connexion.php");
        exit;
    } */
    include_once('../controllers/archivageBd.php');
    /* les inclusions boostrap */
    include('include.php');

    
?>
<!-- 
<div class="container-fluid navBar"> -->
    <div class="card" align="center" style="color: black ">
        <H4>Listes des archivés</H4>
    </div>
   <!-- bontton retour -->
   <br>
   <div>
    <br><br>
    <!-- barre de recherche -->
    <div class="container table-responsive-sm">
        
        <div  class="container search">
            <!-- Boutton fermer -->   
            <div>
                <a href="admin.php">
                    <svg width="20" height="20" viewBox="0 0 32 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.00624 35.0625L0.643738 32.4375L13.6375 18L0.643738 3.5625L3.00624 0.9375L16 15.375L28.9937 0.9375L31.3562 3.5625L18.3625 18L31.3562 32.4375L28.9937 35.0625L16 20.625L3.00624 35.0625Z" fill="#FF0000"/>
                    </svg>
                </a>
            </div>
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
                <th>Date archiv</th>
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
                        <td><?= $row['dateArchive']; ?></td>
                        <div id="alignItems">
                            <td >
                                <a href="../controllers/trmntDesarchiver.php?id=<?=$row['id']?>"><svg width="30" height="35" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 42C8.2 42 7.5 41.7 6.9 41.1C6.3 40.5 6 39.8 6 39V12.85C6 12.35 6.05 11.925 6.15 11.575C6.25 11.225 6.43333 10.9 6.7 10.6L9.5 6.8C9.76667 6.5 10.075 6.29167 10.425 6.175C10.775 6.05833 11.1833 6 11.65 6H36.35C36.8167 6 37.2167 6.05833 37.55 6.175C37.8833 6.29167 38.1833 6.5 38.45 6.8L41.3 10.6C41.5667 10.9 41.75 11.225 41.85 11.575C41.95 11.925 42 12.35 42 12.85V39C42 39.8 41.7 40.5 41.1 41.1C40.5 41.7 39.8 42 39 42H9ZM9.85 11.3H38.1L36.3 9H11.65L9.85 11.3ZM9 14.3V39H39V14.3H9ZM22.5 34.5H25.5V24.45L29.8 28.75L31.8 26.75L24 18.95L16.2 26.75L18.2 28.75L22.5 24.45V34.5ZM9 39H39H9Z" fill="black"/>
                                    </svg>
                                </a>
                            </td>   
                        </div>   
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
