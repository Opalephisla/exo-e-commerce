<?php
require_once(dirname(__FILE__) . "/../configs/database.php");
require_once(dirname(__FILE__) . "/../configs/config.php");

if ($_POST["password"] !== $_POST["confirmPassword"]) {
    header("Location: ../register.php?message=Les mots de passe ne correspondent pas");
}
$passwordToHash = $_POST["password"] . $config["SECRET_KEY"];
$hash = md5($passwordToHash);

$req = $dbh->prepare("INSERT INTO users (email, nom, prenom, bureau, password) VALUES (:email, :nom, :prenom, :bureau, :password)");
$req->bindParam(":email", $_POST["email"]);
$req->bindParam(":nom", $_POST["nom"]);
$req->bindParam(":prenom", $_POST["prenom"]);
$req->bindParam(":bureau", $_POST["bureau"]);
$req->bindParam(":password", $hash);
$req->execute();

header("Location: ../login.php?message=Votre compte a bien été créé");
