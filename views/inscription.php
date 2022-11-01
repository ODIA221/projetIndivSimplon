
<!-- inclusion css boostrap -->
<?php 
    include_once("include.php");
?>
<!-- inclusion css boostrap -->

<!-- inclusion controller -->
<?php include_once("../controllers/trtmentInscript.php");?>
<!-- inclusion controller -->


<div class="container form">
  <!--   <div>
        <H1>Inscription</H1>
    </div> -->
    <div class="container">
        <!-- message mot de pass différent -->
            <small id="mdp#" style="color: red"></small>
        <!-- message mot de pass différent -->
        <!-- message mail invalide -->
            <small id="mailValide" style="color: red"></small>
        <!-- message mail invalide -->

    <form action="../controllers/trtmentInscript.php" method="POST" id="inscription">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom">
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mailInscript">Email</label>
                <input type="text" class="form-control" name="mailInscript" id="mailInscript">
            </div>
            <div class="form-group col-md-6">
                <label for="role">Role</label>
                <select id="role" name="role" class="form-control">
                    <option selected>Admin</option>
                    <option>User</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mdpInscript">Mot de passe</label>
                <input type="password" class="form-control" name="mdpInscript" id="mdpInscript">
            </div>
            <div class="form-group col-md-6">
                <label for="confirmMdp">Confirmer mot de passe</label>
                <input type="password" class="form-control" name="confirmMdp" id="confirmMdp">
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
                <button type="submit" class="btn btn-primary" name="btnInscript">S'inscrire</button>
                ||
                <span><a href="connexion.php">Se connecter</a></span>
            </div>
        </div>
        
        <div>
            <!-- message connexion réeussie -->
            <H1 id="success" style="color: green"></H1>
            <!-- message connexion réeussie -->
            <!-- message erreurs champs -->
            <small id="errors" style="color: red"></small>
            <!-- message erreurs champs -->

        </div>
    
    </form>
</div>


<!-- fichier JS -->
<script src="test.js"></script>