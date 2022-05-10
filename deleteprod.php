<?php
require_once("components/header.php");
require_once("configs/database.php")
?>
<?php $action = "/functions" . "/delete.php?id=" . $_GET["id"]; ?>

<div id="form" class="container-fluid">
    <form action=<?php echo $action ?> class="col-md-6" method="post">
        <h1>Supprimer un produit</h1>
        <br>
        <?php if (isset($_GET["id"])) : ?>
            <div class="alert alert-danger" id="id" role="alert">
                <?php
                $id = $_GET["id"];
                $req = $dbh->query("SELECT * FROM products WHERE id=$id");
                $product = $req->fetch();
                echo $product["nom"] ?>
            </div>
        <?php endif ?>
        <?php if (isset($_GET["message"])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET["message"]; ?>
            </div>
        <?php endif ?>
        <div class="from-group">
            <br>
            <input id="btn-submit" type="submit" value="Supprimer le produit" class="btn-success">
            <a href="index.php"><button type="button" class="btn-secondary">Annuler</button></a>
        </div>
    </form>
</div>

<?php
require_once("components/footer.php")
?>
