<?php
include 'connexion/database.php'; 
global $db;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter vos Favoris</title>
</head>
<body>
    
<form action="" method="post">
    <br>
    <br>
  <label for="name">Nom :</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="url">URL :</label>
  <input type="text" id="url" name="url"><br><br>
  <label for="desc">Description :</label>
  <input type="text" id="desc" name="desc"><br><br>
  <select name="categorie">
    <?php
        $query = $db->prepare("SELECT * FROM `categorie`");
        $query->execute();
        $favoris = $query->fetchAll();
        foreach ($favoris as $favori) {
          echo '<option value="'.$favori['id_categorie'].'">'.$favori['nom_categorie'].'</option>';
        }
      ?>
  </select>
  <br>
  <input type="submit" value="Valider">
</form>




<?php

if (isset($_POST['name']) && isset($_POST['url']) && isset($_POST['desc'])){
  //var_dump($_POST);
    $LiensNom = $_POST['name']; //on viens recuperer l'attribut name="name", qu'on va mettre dans une nouvelle variables ($Liensnom), ensuite on l'injecte dans notre SQL !
    $LiensUrl = $_POST['url'];
    $LiensDescription = $_POST['desc'];
    $idcategorie = $_POST['categorie'];
    $sqlQuery = "INSERT INTO `liens` (`nom_liens`, `url_liens`, `desc_liens`) VALUES ('$LiensNom', '$LiensUrl', '$LiensDescription')";

    $newDbEntry = $db->prepare($sqlQuery); // je prepare la variable sqlQuery
    $newDbEntry->execute(); // j'execute la variable sqlQuery
    $liensid = $db->lastinsertId(); // On crée la variable $liensId, pour récuperer le dernier id.

    $sqlQuery = ""; // J'initialise (on reprend a zero cette variable) la variable sqlQUery car je les utiliser en haut.
    $sqlQuery = "INSERT INTO categ_liens (`id_liens`, `id_categorie`) VALUES ($liensid, $idcategorie)"; //cette requete va servir pour ma table de jointure || Un entier c'est un nombre donc $liensid est un entier !
    $newDbEntry = $db->prepare($sqlQuery);
    $newDbEntry->execute();
    
    //var_dump($liensid); // donner les données ou afficher du contenue dans nos variables 
    echo '<script>alert("Votre entrée a bien été ajoutée!")</script>';
} 

?>

<button type="button">
  <a href="http://localhost/Brief%205/index.php">Revenir</a>
</button>

</body>    
 


</html>