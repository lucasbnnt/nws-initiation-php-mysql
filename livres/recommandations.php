<?php
include '../partials/header.php';
require_once '../includes/db.php';

$query = $bdd->query("SELECT * FROM Livres ORDER BY id DESC");
$livres = $query->fetchAll(PDO::FETCH_OBJ);

if (isset($_GET['success']))    {
    $message_type = "success";                                 
    if ($_GET['success'] === "created") {
        $message = "La recommandation a été ajoutée avec succès.";
    }
    if ($_GET['success'] === "deleted") {
        $message = "La recommandation a été supprimée avec succès.";
    }
    if ($_GET['success'] === "updated") {
        $message = "La recommandation a été modifiée avec succès.";
    }
    }   

?>

<main class="container">
    <h1>Livres</h1>
    <?php
    if (isset($message)) : ?>
        <p data-notice=">?= $message_type ?>">
            <span><?= $message ?></span>
            <i data-feather="x" data-close></i>
    </p>
<?php endif; ?>

<table class="container">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Année de publication</th>
            <th>Note sur 5</th>
            <th>Genre</th>
        </tr>
    </thead>
    <body>
    <tbody>
<?php
foreach ($livres as $un_livre) {
    echo "<tr>";
    echo "<td>" . $un_livre->titre . "</td>";
    echo "<td>" . $un_livre->auteur . "</td>";
    echo "<td>" . $un_livre->annee_publication . "</td>";
    echo "<td>" . $un_livre->note . "</td>";
    echo "<td>" . $un_livre->genre . "</td>";
    
    echo "<td><a href='delete.php?id=".$un_livre->id."'>🗑️</a></td>";
    echo "<td><a href='update.php?id=".$un_livre->id."'>Modifier</a></td></tr>";

}
?>
    </tbody>
</table>



<main class="container">
    <h1> Ajouter un livre </h1>
    <form action="connexionbase.php" method="post">
        <label for="titre">Titre</label>
        <input type="text" id="titre" name="titre">
        <br>
        <label for="auteur">Auteur</label>
        <input type="text" id="auteur" name="auteur">
        <br>
        <label for="annee_publication">Année de publication</label>
        <input type="number" id="annee_publication" name="annee_publication">
        <br>
        <label for="note">Note sur 5</label>
        <input type="number" id="note" name="note" step="0" min="0" max="5">
        <br>
        <label for="genre">Genre</label>
        <select id="genre" name="genre">
            <option value="">Sélectionnez un genre</option>
            <option value="roman">Roman</option>
            <option value="policier">Policier</option>
            <option value="thriller">Thriller</option>
            <option value="science_fiction">Science-fiction</option>
            <option value="romance">Romance</option>
            <option value="histoire">Histoire</option>
        </select><br>
        <button type="submit">Envoyer</button>
    </form>
</main>

<?php
require '../partials/footer.php';
?>
