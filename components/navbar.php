<?php
if (isset($_GET["categ"])) {
    $categ = $_GET["categ"];
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?categ=homme">Homme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?categ=femme">Femme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?categ=enfant">Enfants</a>
                </li>
                <?php if (isset($_SESSION["id_role"]) and $_SESSION["id_role"] === 1) : ?>
                    <button id="add-prod" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                        Ajouter un produit
                    </button>
                <?php endif ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Recherche">
                <button id="search-btn" class="btn btn-warning btn-outline-dark" type="submit">🔍</button>

                <a href="cart.php" id="cart-btn" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg></a>
            </form>
            <br>
            <?php if (isset($_SESSION["email"])) : ?>
                <div id="username"><?php if (isset($_SESSION["prenom"])) echo "Bienvenue " . $_SESSION["prenom"] ?></div>
                <a class="btn btn-danger" href="functions/disconnect.php">Déconnexion</a>
            <?php else : ?>
                <a class="btn btn-primary" href="login.php">Connexion</a>
            <?php endif ?>
        </div>
    </div>
</nav>
<?php if (!isset($_GET["message"])) : ?>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <?php else : ?>
        <div class="modal fade show" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: block;" aria-modal="true" role="dialog">
        <?php endif ?>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un produit</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if (!isset($_GET["categ"])) : ?>
                        <form action="functions/ajoutProduit.php" enctype="multipart/form-data" class="col-md-6" method="post">
                        <?php else : ?>
                            <form action="functions/ajoutProduit.php?categ=<?= $categ ?>" enctype="multipart/form-data" class="col-md-6" method="post">
                            <?php endif ?>
                            <br>
                            <?php if (isset($_GET["message"])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_GET["message"]; ?>
                                </div>
                            <?php endif ?>
                            <div class="form-group">
                                <input type="text" name="nomprod" class="form-control" placeholder="Entrez le nom du produit">
                            </div>
                            <br>
                            <div class="form-group">
                                <textarea name="description" class="form-control" placeholder="Entrez la description du produit"></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" name="prixht" class="form-control" placeholder="Indiquez le prix ht du produit">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" name="tva" class="form-control" placeholder="Indiquez la tva du produit">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" name="prixttc" class="form-control" placeholder="Indiquez le prix ttc du produit">
                            </div>
                            <br>
                            <div class="form-group">
                                <?php if (isset($_GET["categ"])) : ?>
                                    <input type="text" name="gender" class="form-control" value=<?php echo $_GET["categ"]; ?> readonly>
                                <?php else : ?>
                                    <input type="text" name="gender" class="form-control" placeholder="Indiquez le genre du produit">
                                <?php endif ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>

                            <br>
                </div>
                <div class="modal-footer">
                    <?php if (isset($_GET["categ"])) : ?>
                        <a href="index.php?categ=<?php echo $categ ?>" type="button" class="btn btn-danger">Annuler</a>
                    <?php else : ?>
                        <a href="index.php" type="button" class="btn btn-danger">Annuler</a>
                    <?php endif ?>
                    <button type="submit" class="btn btn-primary">Ajouter le produit</button>
                </div>
                </form>
            </div>
        </div>
        </div>
