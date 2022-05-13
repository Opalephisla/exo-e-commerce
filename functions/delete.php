<?php
require_once("../configs/database.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $req = $dbh->prepare("DELETE FROM products WHERE id=$id");
    $req->execute();
    if (isset($_GET["categ"]))
        header("Location: ../index.php?categ=" . $_GET["categ"]);
} else {
    header("Location: ../deleteprod.php?message=Merci de remplir tous les champs");
}
