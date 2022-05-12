<?php
require_once("../configs/database.php");
$target_dir = "../img/products/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        header("Location: ../index.php?categ=" . $_GET["categ"] . "?id=" . $_GET["id"] . "&modif&message=Le fichier n'est pas une image");
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    header("Location: ../index.php?categ=" . $_GET["categ"] . "?id=" . $_GET["id"] . "&modif&message=Le fichier est trop volumineux");
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "png") {
    header("Location: ../index.php?categ=" . $_GET["categ"] . "?id=" . $_GET["id"] . "&modif&message=Seuls les fichiers PNG sont autorisés");
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header("Location: ../index.php?categ=" . $_GET["categ"] . "?id=" . $_GET["id"] . "&modifmessage=Le fichier n'a pas été téléchargé");
    // if everything is ok, try to upload file
} else {
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
        "Location: ../index.php?categ=" . $_GET["categ"] . "?id=" . $_GET["id"] . "&modif?message=Une erreur est survenue lors du téléchargement du fichier";
}

$alt = basename(htmlspecialchars(basename($_FILES["fileToUpload"]["name"])), ".png");

$id = htmlspecialchars($_GET["id"]);

if (
    isset($_POST["nomprod"]) && isset($_POST["description"]) && isset($_POST["prixht"]) && isset($_POST["tva"]) && isset($_POST["prixttc"]) &&
    isset($_POST["gender"]) && isset($_GET["id"])
) {
    $req = $dbh->prepare("UPDATE products SET nom=:nom, description=:description, prixht=:prixht, tva=:tva, prixttc=:prixttc, alt=:alt, gender=:gender WHERE id=$id");
    $req->bindParam(":nom", $_POST["nomprod"]);
    $req->bindParam(":description", $_POST["description"]);
    $req->bindParam(":prixht", $_POST["prixht"]);
    $req->bindParam(":tva", $_POST["tva"]);
    $req->bindParam(":prixttc", $_POST["prixttc"]);
    $req->bindParam(":alt", $alt);
    $req->bindParam(":gender", $_POST["gender"]);
    $req->execute();
    if (isset($_GET["categ"]))
        header("Location: ../index.php?categ=" . $_GET["categ"]);
    else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php?categ=" . $_GET["categ"] . "?id=" . $_GET["id"] . "&modif");
}
