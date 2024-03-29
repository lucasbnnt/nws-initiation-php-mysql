<?php
require_once "../includes/db.php";

$query = $bdd->prepare("DELETE FROM Livres WHERE id=:id");
$query->execute([
    "id" => $_GET['id']
]);

header("Location: /livres/recommandations.php?success=deleted");
exit();
?>
