<?php
$titre = "Modifier votre destination";

require_once "../includes/db.php";
include '../partials/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $bdd->prepare("SELECT * FROM Livres WHERE id = :id");
    $query->execute([':id' => $id]);
    $livres = $query->fetch(PDO::FETCH_OBJ);

    print_r ($livres);
    if (!$livres) {
        echo "Destination non trouvée.";
        exit();
    }
} else {
    echo "Identifiant de destination non spécifié.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['annee_publication']) && !empty($_POST['note']) && !empty($_POST['genre'])) {
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];
        $annee_publication = $_POST['annee_publication'];
        $note = $_POST['note'];
        $genre = $_POST['genre'];
        
        $query = $bdd->prepare("UPDATE Livres SET titre = :titre, auteur = :auteur, annee_publication = :annee_publication, note = :note, genre = :genre WHERE id = :id");
        $query->execute([
            ':titre' => $titre,
            ':auteur' => $auteur,
            ':annee_publication' => $annee_publication,
            ':note' => $note,
            ':genre' => $genre,
            ':id' => $id
        ]);

        header("Location: /livres/recommandations.php?success=updated");
        exit();
    } else {
        echo "Veuillez remplir tous les champs.";
    }
       
}

?>

<main class="container">
    <h1>Modifier la recommandation</h1>

    <form action="save.php?id=<?= $livres->id ?>" method="POST">
        <label for="titre">Titre</label>
        <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($livres->titre) ?>">

        <label for="auteur">Auteur</label>
        <input type="text" id="auteur" name="auteur" value="<?= isset($_POST['auteur']) ? htmlspecialchars($_POST['auteur']) : htmlspecialchars($livres->auteur) ?>">

        <label for="annee_publication">Année de publication</label>
        <input type="text" id="annee_publication" name="annee_publication" value="<?= isset($_POST['annee_publication']) ? htmlspecialchars($_POST['annee_publication']) : htmlspecialchars($livres->annee_publication) ?>">

        <label for="note">Note sur 5</label>
        <textarea id="note" name="note"><?= isset($_POST['note']) ? htmlspecialchars($_POST['note']) : htmlspecialchars($livres->note) ?></textarea>

        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre" value="<?= isset($_POST['genre']) ? htmlspecialchars($_POST['genre']) : htmlspecialchars($livres->genre) ?>">

        <button type="submit">Mettre à jour</button>
    </form>
</main>

