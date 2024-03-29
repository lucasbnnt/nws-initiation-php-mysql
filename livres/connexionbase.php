<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

require_once "../includes/db.php";

$query = $bdd->prepare("
    INSERT INTO Livres 
    SET
    titre=:titre,
    auteur=:auteur,
    annee_publication=:annee_publication,
    note=:note,
    genre=:genre
");

$query->execute([
    "titre" => $_POST['titre'],
    "auteur" => $_POST['auteur'],
    "annee_publication" => $_POST['annee_publication'],
    "note" => $_POST['note'],
    "genre" => $_POST['genre'],
]);

header("Location: /livres/recommandations.php?success=created");
exit();
?>