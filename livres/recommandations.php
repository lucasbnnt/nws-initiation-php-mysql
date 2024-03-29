<?php
include '../partials/header.php'; 

echo '<pre>';
print_r ($_POST);
echo '</pre>';

?>



<main class="container">
    <h1> Ajouter un livre </h1>
    <form action="" method="post">

        <label for="titre">Titre</label>
        <input type="text" id="titre" name="titre">
        <br>
        <label for="auteur">Auteur</label>
        <input type="auteur" id="auteur" name="auteur">
        <br>
        <label for="genre">Genre</label>
        <input type="genre" id="genre" name="genre">
        <br>
        <label for="annee_publication">Annee_Publication</label>
        <input type="annee_publication" id="annee_publication" name="annee_publication">
        <br>
        <label for="note"> Note sur 5 </label>
        <input type="number" id="note" name="note" step="1" min="0" max="5">
        <br>

    <label for="genre">Email</label>
        <select id="genre" name="genre">
            <option value="">Sélectionnez un genre</option>
            <option value="roman">Roman</option>
            <option value="policier">Policier</option>
            <option value="thriller">Thriller</option>
            <option value="science_fiction">Science_fiction</option>
            <option value="romance">Romance</option>
            <option value="histoire">Histoire</option>
    </select><br>
    

    <button>Envoyer</button>
    </form>


</main>

<?php
require '../partials/footer.php' ; ?>