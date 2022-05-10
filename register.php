<?php
require_once("components/header.php")
?>

<div id="form" class="container-fluid">
    <a href="login.php" id="login-btn" class="btn-secondary">Connexion</a>
    <form action="functions/createUser.php" class="col-md-6" method="post">
        <h1>Créer un compte</h1>
        <br>
        <?php if (isset($_GET["message"])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET["message"]; ?>
            </div>
        <?php endif ?>
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Entrez votre adresse mail">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="nom" class="form-control" placeholder="Entrez votre nom">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="prenom" class="form-control" placeholder="Entrez votre prénom">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="bureau" class="form-control" placeholder="Entrez le numéro de votre bureau">
        </div>
        <br>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe">
        </div>
        <br>
        <div class="form-group">
            <input type="password" name="confirmPassword" class="form-control" placeholder="Confirmez le mot de passe">
        </div>
        <div class="from-group">
            <br>
            <input id="btn-submit" type="submit" value="Créer mon compte" class="btn-success">

        </div>
    </form>
</div>

<?php
require_once("components/footer.php")
?>
