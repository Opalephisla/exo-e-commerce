<?php
require_once("components/header.php");
require_once("configs/database.php")
?>
<?php $action = "/functions" . "/edit.php?id=" . $_GET["id"]; ?>

<div id="form" class="container-fluid">
    <form action=<?php echo $action ?> enctype="multipart/form-data" class="col-md-6" method="post">
        <h1>Modifier un produit</h1>
        <br>
        <?php if (isset($_GET["id"])) : ?>
            <div class="alert alert-success" id="id" role="alert">
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
        <div class="form-group">
            <input type="text" name="nomprod" class="form-control" placeholder="Entrez le nom du produit" value="<?php echo $product["nom"] ?>">
        </div>
        <br>
        <div class="form-group">
            <textarea name="description" class="form-control" placeholder="Entrez la description du produit"><?php echo $product["description"] ?></textarea>
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="prixht" class="form-control" placeholder="Indiquez le prix ht du produit" value="<?php echo $product["prixht"] ?>">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="tva" class="form-control" placeholder="Indiquez la tva du produit" value="<?php echo $product["tva"] ?>">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="prixttc" class="form-control" placeholder="Indiquez le prix ttc du produit" value="<?php echo $product["prixttc"] ?>">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="gender" class="form-control" placeholder="Indiquez le genre du produit" value="<?php echo $product["gender"] ?>">
        </div>
        <br>
        <?php $img = "/img" . "/products" . "/" . $product["alt"] . ".png" ?>
        <div class="form-group">
            <input type="file" name="fileToUpload" id="fileToUpload" value=<?php echo $img ?>>
        </div>
        <br>
        <div class="from-group">
            <br>
            <input id="btn-submit" type="submit" value="Modifier le produit" class="btn-success">
            <a href="index.php"><button type="button" class="btn-secondary">Annuler</button></a>
        </div>
    </form>
</div>

<?php
require_once("components/footer.php")
?>
