<!-- fichier css et boostrap -->
<?php
   //sécurité
/*     if(!isset($_SESSION['auth'])) {
        header("location: connexion.php");
        exit;
    }  */

   

    include('../config/bd.php');
    /* include('../controllers/afficherBd.php') */;
    include('include.php');
    /* les inclusions pour traiment backend */
    include('../controllers/afficherUser.php');




?>
<!-- fichier css et boostrap -->



<!-- formulaire -->
<!-- nav -->

<div class="container-fluid navBar">
     <!-- photo profil -->
    <div class="profil">
        <?php
            if (isset($_SESSION['id'])) {
                $idUser = $_SESSION['id'];        
                $select = $bd -> query("SELECT photo FROM `utilisateur` WHERE id = $idUser");
                $rowPhoto =$select -> fetch();

            }

        ?>
        <!-- Importation img -->
        <img src="data:image/jpg;charset=utf8;base64,
            <?php echo base64_encode($rowPhoto['photo'])     ?>" 
            alt="" srcset="" height=100% width=100% border-radius= 100%
        >
    
    </div>

    <!-- Indos du user connecté -->
    <div style="color: #FFFFFF;">
 
    </div>

    <nav>
    <a class="navbar-brand lienNav" href="affichageArchivageUser.php">Liste des archivés</a>
        <a class="navbar-brand lienNav" href="../controllers/trtmentDeconnexion.php">
            <svg width="20" height="20" viewBox="0 0 46 56" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.83333 56C2.81111 56 1.91667 55.5333 1.15 54.6C0.383333 53.6667 0 52.5778 0 51.3333V4.66667C0 3.42222 0.383333 2.33333 1.15 1.4C1.91667 0.466667 2.81111 0 3.83333 0H22.425V4.66667H3.83333V51.3333H22.425V56H3.83333ZM34.8833 41.6111L32.1361 38.2667L38.6528 30.3333H16.2917V25.6667H38.525L32.0083 17.7333L34.7556 14.3889L46 28.0778L34.8833 41.6111Z" fill="white"/>
            </svg>

        </a>
    </nav>
</div>
<br>
<br>
<!-- nav -->

<!-- main -->
    <!-- barre de recherche -->
    <div class="container table-responsive-sm-md-lg-xl">
        <div  class="container search">
            <form class="search" action="" method="GET">
                <input type="search" id="search_emp_input" name="recherche" placeholder="recherche..." required  size=50>
                <input id="search_emp_button" type="submit" value="recherche" name="submit">
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

            echo "Aucune données n'a été trouvée";
            ?>
            <br>
            <br>
            <?php           
        }   
    ?>
    </table>

<!--  pagination -->
<div class="container">
            <nav>
                <ul class="pagination">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for($page = 1; $page <= $pages; $page++): ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
                </ul>
            </nav>
        </div>
</div>

<!-- /pagination -->


<!-- /main -->

<!-- footer -->
<div class="container-fluid footer">
<nav>
    user
</nav>
</div>

<!-- /footer -->
