<?php
require_once("../configs/database.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $req = $dbh->prepare("DELETE FROM products WHERE id=$id");
    $req->execute();
    header("Location: ../index.php");
} else {
    header("Location: ../deleteprod.php?message=Merci de remplir tous les champs&id=" . $id);
}
