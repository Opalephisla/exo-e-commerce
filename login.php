<?php
require_once("components/header.php")
?>

<div id="form" class="container-fluid">
    <?php if (isset($_GET["message"])) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET["message"]; ?>
        </div>
    <?php endif ?>
    <form action="functions/loginUser.php" class="col-md-6" method="post">
        <h1>Je me connecte</h1>
        <br>
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Entrez votre adresse mail">
        </div>
        <br>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe">
        </div>
        <br>
        <div class="from-group">
            <br>
            <input id="btn-submit" type="submit" value="Connexion" class="btn-secondary">
            <a href="register.php" class="btn-success">Créer mon compte</a>

        </div>
    </form>
</div>

<?php
require_once("components/footer.php")
?>
