<?php
require_once(dirname(__FILE__) . "/../configs/database.php");
require_once(dirname(__FILE__) . "/../configs/config.php");

$passwordToHash = $_POST["password"] . $config["SECRET_KEY"];
$hash = md5($passwordToHash);

$req = $dbh->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
$req->bindParam(":email", $_POST["email"]);
$req->bindParam(":password", $hash);
$req->execute();

$result = $req->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    header("Location: ../login.php?message=Identifiants incorrects");
} else {
    session_start();
    $_SESSION["email"] = $result["email"];
    $_SESSION["nom"] = $result["nom"];
    $_SESSION["prenom"] = $result["prenom"];
    $_SESSION["bureau"] = $result["bureau"];
    $_SESSION["id_role"] = $result["id_role"];
    header("Location: ../index.php");
}
