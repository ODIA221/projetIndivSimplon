
<!-- inclusion css boostrap -->
<?php 
    require_once('../config/bd.php');
    include_once("include.php");

    include_once('../controllers/trtmentInscript.php');
    
?>
<!-- inclusion css boostrap -->

<!-- Modifier -->
<?php

if (isset($_POST['btnModifier'])) {

    $id = $_GET['id'];

    //Rechercher si user existe
    $chearcher = ('SELECT * FROM utilisateur WHERE id = $id ');
    $chearch = $bd -> query($chearcher);

    //insertion dans la base de données si l'utilsateur existe pas sinon msgErrors
    if ($chearch -> rowCount() > 0) {

        $id = $_GET['id'];

        $req = "UDATE utilisateur SET
            nom = '$nom',
            prenom = '$prenom',
            mail = '$mailInscript';
            roles = '$role',
            mdp = '$mdpInscript';
            WHERE id = '$id' "; 
         $upadate = $bd -> query($req); 
        if($upadate){
            header("location: admin.php");
        }
    }
   



   
}





?>







<div class="container form">
  <!--   <div>
        <H1>Inscription</H1>
    </div> -->
    <div class="container">
        <!-- message connexion réeussie -->
            <small id="mdp#"></small>
        <!-- message connexion réeussie -->
        <!-- message connexion réeussie -->
            <small id="mailValide"></small>
        <!-- message connexion réeussie -->

    <form action="" method="POST" id="inscription">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?= $chearch['nom'] ;?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mailModif">Email</label>
                <input type="text" class="form-control" name="mailModif" id="mailInscript" >
            </div>
            <div class="form-group col-md-6">
                <label for="role">Role</label>
                <select id="role" name="role" class="form-control" >
                    <option selected>Admin</option>
                    <option>User</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mdpModif">Mot de passe</label>
                <input type="password" class="form-control" name="mdpModif" id="mdpInscript" >
            </div>
            <div class="form-group col-md-6">
                <label for="confirmMdp">Confirmer mot de passe</label>
                <input type="password" class="form-control" name="confirmMdp" id="confirmMdp" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="photo">Ajouter un photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary" name="btnModifier">Modifier</button>
                <!-- ||
                <span><a href="connexion.php">Se connecter</a></span> -->
            </div>
        </div>
        
        <div>
            <!-- message connexion réeussie -->
            <small id="success"></small>
            <!-- message connexion réeussie -->
            <!-- message connexion réeussie -->
                    <small id="errors"></small>
            <!-- message connexion réeussie -->

        </div>
    
    </form>
</div>


<!-- fichier JS -->
<script src="test.js"></script>