<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

require_once "../includes/db.php";

$query = $bdd->prepare("
    UPDATE Livres 
    SET
    titre=:titre,
    auteur=:auteur,
    annee_publication=:annee_publication,
    note=:note,
    genre=:genre
    WHERE id=:id
");

$query->execute([
    "titre" => $_POST['titre'],
    "auteur" => $_POST['auteur'],
    "annee_publication" => $_POST['annee_publication'],
    "note" => $_POST['note'],
    "genre" => $_POST['genre'],
    "id" => $_GET['id'],
]);

header("Location: /livres/recommandations.php?success=updated");
exit();
?>
