

<!-- inclusion controller -->
<?php
    include_once("../controllers/trtmentConnexion.php");
     ?>
<!-- inclusion controller -->

<!-- inclusion fichier sécurité -->

<!-- inclusion fichier sécurité -->


<!-- inclusion css boostrap -->
    <?php include_once("include.php");?>
<!-- inclusion css boostrap -->

<!-- erreurs -->

<div class="card" align="center" style="color: black ">
    <H4>CONNEXION</H4>
  </div>
<div class="container form">

    <div class="container">
        <!-- message mail invalide -->
              <small id="mailValide" style="color: red"></small>
        <!-- message mail invalide -->
        <!-- Forrmulaire -->
        <form action="../controllers/trtmentConnexion.php"  method="POST" id="connexion" name="connexion">
            <div class="form-group">
                <label for="mailConnect">Email <SPan style="color: red">*</SPan> </label>
                <input type="mail" class="form-control" id="mailConnect"  name="mailConnect">
                
<?php if (isset($mailPris)) {echo "mail pris !";} ;?>

            </div>
            <div class="form-group">
                <label for="mdpConnect">Mot de passe <SPan style="color: red">*</SPan> </label>
                <input type="password" class="form-control" id="mdpConnect" name="mdpConnect">
            </div>
            <div>
                <button type="submit" class="btn btn" name="btnConnect" onclick=" conroleMail()" style="background-color: #B9B2B2; color: #FFFFFF"><b>Se conneecter</b></button>
                ||
                <a href="inscription.php">S'inscription</a>
            </div>
        </form>
        <div>
                    <!-- message connexion réeussie -->
                    <small id="success" style="color: green"></small>
                    <!-- message connexion réeussie -->
                    <!-- message erreur chmps vide -->
                    <small id="errors" style="color: red"></small>
                    <!-- message erreur chmps vide -->
        
        </div>

    </div>
</div>


<!-- fichier JS -->
<script src="index.js"></script>
