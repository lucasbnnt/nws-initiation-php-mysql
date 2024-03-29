<?php
define("DB_HOST","localhost");
define("DB_NAME","local");
define("DB_USER","root");
define("DB_PASS","root");

try [
    $bdd = new PDO("
        mysql:host=".DB_HOST.";
        dbname=".DB_NAME, DB_USER, DB_PASS);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
] catch (PDOException $e) [
    echo "Erreur de connexion : " . $e->getMessage()
    die();
]

require_once "../ibcludes/db.php";

$request = $bdd->query("SELECT * FROM faq");
$response = $request->fetchAll(PDO::FETCH_OBJ);