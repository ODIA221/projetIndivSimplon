
<!-- inclusion css boostrap -->
    <?php include_once("include.php");?>
<!-- inclusion css boostrap -->


<br>
<br>

<div class="container form">
  <!--   <div>
        <H1>Connexion</H1>
    </div> -->
    <div class="container">
        <!-- message connexion réeussie -->
              <small id="mailValide"></small>
        <!-- message connexion réeussie -->


        <form action="../controllers/trtmentConnexion.php"  method="POST" id="connexion" name="connexion">
            <div class="form-group">
                <label for="mailConnect">Email</label>
                <input type="text" class="form-control" id="mailConnect"  name="mailConnect">
            </div>
            <div class="form-group">
                <label for="mdpConnect">Mot de passe</label>
                <input type="password" class="form-control" id="mdpConnect" name="mdpConnect">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="btnConnect" onclick=" conroleMail()">Se conneecter</button>
                ||
                <a href="inscription.php">S'inscription</a>
            </div>
        </form>
        <div>
            <!-- message connexion réeussie -->
            <small id="success"></small>
            <!-- message connexion réeussie -->
            <!-- message connexion réeussie -->
                    <small id="errors"></small>
            <!-- message connexion réeussie -->

        </div>

    </div>
</div>


<!-- fichier JS -->
<script src="index.js"></script>
