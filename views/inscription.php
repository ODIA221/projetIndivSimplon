
<!-- inclusion css boostrap -->
<?php 
    include_once("include.php");
?>
<!-- inclusion css boostrap -->

<!-- inclusion controller -->
<?php include_once("../controllers/trtmentInscript.php");?>
<!-- inclusion controller -->


<div class="card" align="center" style="color: black ">
    <H4>Indcription</H4>
</div>

<div class="container form">
    <div class="container">
        <!-- message mot de pass différent -->
            <small id="mdpDiferrent" style="color: red"></small>
        <!-- message mot de pass différent -->
        <!-- message mail invalide -->
            <small id="mailValide" style="color: red"></small>
        <!-- message mail invalide -->


    <form action="../controllers/trtmentInscript.php" method="POST" id="inscription" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom">Nom <SPan style="color: red">*</SPan> </label>
                <input type="text" class="form-control" name="nom" id="nom">
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Prénom <SPan style="color: red">*</SPan> </label>
                <input type="text" class="form-control" name="prenom" id="prenom">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mailInscript">Email <SPan style="color: red">*</SPan> </label>
                <input type="text" class="form-control" name="mailInscript" id="mailInscript">
            </div>
            <div class="form-group col-md-6">
                <label for="role">Role <SPan style="color: red">*</SPan> </label>
                <select id="role" name="role" class="form-control">
                    <option selected>Admin</option>
                    <option>User</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mdpInscript">Mot de passe <SPan style="color: red">*</SPan> </label>
                <input type="password" class="form-control" name="mdpInscript" id="mdpInscript">
            </div>
            <div class="form-group col-md-6">
                <label for="confirmMdp">Confirmer mot de passe <SPan style="color: red">*</SPan></label>
                <input type="password" class="form-control" name="confirmMdp" id="confirmMdp">
                <!-- message mot de pass différent -->
                    <small id="mdp#" style="color: red"></small>
                <!-- message mot de pass différent -->
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="photo">Ajouter un photo</label>
                <input type="file" class="form-control" id="photo" name="photo" accept=".png, .jpg, .jpeg, gif">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn" name="btnInscript" style="background-color: #B9B2B2; color: #FFFFFF"><b>S'inscrire</b></button>
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