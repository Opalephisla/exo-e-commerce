<?php
require_once("config.php");
try {
    $dbh = new PDO("mysql:host={$config["DB_HOST"]};dbname={$config["DB_NAME"]}", $config["DB_USER"], $config["DB_PASSWORD"]);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
