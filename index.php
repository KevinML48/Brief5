<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="favoris.css"> 
    <title>Vos Favoris</title>
</head>
<body>

<?php
include 'connexion/database.php'; 
global $db;

?>

<p class="text-center" id="bvn">
<?php

    echo "Bonjour vous êtes bien sur vos favoris.<br>";
?>
</p>

<div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">Vos Favoris déja enregistrer !</h5>
    <p class="card-text">  
<!--  entête colonne -->
<table class="table">
    <tr>
        <th>Nom</th>
        <th>description</th>
        <th>categorie</th>
        <th>Actions</th>
    </tr>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=favoris', 'root', '');

$stmt = $pdo->query('SELECT t3.nom_liens,t3.desc_liens, t2.nom_categorie, t3.id
                    FROM categ_liens AS t1
                    JOIN categorie AS t2
                    ON t2.id_categorie = t1.id_categorie
                    JOIN liens AS t3
                    ON t3.id=t1.id_liens 
                    ORDER BY 1'
                    );
$favoris = $stmt->fetchAll();

echo "<tbody>";

foreach ($favoris as $favori) { ?>

    <?php echo "<tr>"; ?>
    <?php echo "<td>"; ?> <a href="<?= $favori['url_lien'] ?>" target="_blank"><?= $favori['nom_liens'] ?></a> <?php echo "</td>" ; ?>
    <?php echo "<td>"; ?> <?= $favori['desc_liens'] ?> <?php echo "</td>"; ?>
    <?php echo "<td>"; ?> <?= $favori['nom_categorie'] ?> <?php echo "</td>"; ?>
    <?php echo "<td>"; ?> <a class="btn btn-success btn-sm" href="edit.php?id=<?= $favori['id'] ?>">Edit</a>
    <?php echo "</tr>"; ?>

<?php } ?>;
<?php echo "</tbody>"; ?>
<?php echo "</table>"; ?>

    
    </p>
  </div>
</div>


<div class="container">
    <div class="card text-center">
        <div class="card-body">
            <form method="POST" action="">
             <br>
             <br>
                <input type="text" name="search" placeholder="Rechercher un lien...">
                <input type="submit" value="Rechercher">
                    <button type="button" class="btn btn-outline-dark">
                        <a href="http://localhost/Brief%205/addfavoris.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z"/>
                            </svg>
                        Ajouter
                        </a>
                    </button>

                    <button type="button" class="btn btn-outline-dark">
                        <a  href="http://localhost/Brief%205/deletefavoris.php?search=efzf">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg> 
                            Delete 
                        </a>
                    </button>
            <br>
            <br>
            </form>
        </div>
    </div>
</div>


        <div class="container">
            <div class="text-recherche">
                <div class="card text-center">
                    <div class="card-body">

                        <?php

                            if(isset($_POST["search"])) {
                                $search = $_POST["search"];
                            } 

                            if (!empty($search)) {
                                echo "Vous avez recherché : " .$search;
                                $query = $db->prepare("SELECT * FROM `liens` WHERE `nom_liens` LIKE :search");
                                $query->execute(['search' => "%$search%"]);
                                $liens = $query->fetchAll();
                                if(count($liens)>0){
                                    echo "<table class='table table-bordered'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Nom</th>";
                                    echo "<th>URL</th>";
                                    echo "<th>Description</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    foreach ($liens as $lien) {
                                        echo "<tr>";
                                        echo "<td>" . $lien['nom_liens'] . "</td>";
                                        echo "<td>" . $lien['url_liens'] . "</td>";
                                        echo "<td>" . $lien['desc_liens'] . "</td>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                } else {
                                    echo " VOUS N'AVEZ PAS DE FAVORIS A CE NOM !";
                                }
                            }
                        ?>

                    </div>
                </div>
            </div>  
        </div>



<?php



?>

    <br><br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-outline-light" type="button">

  <a href="index.php" class="back_btn"><img src="data:image/png;base64,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" style="width: 15px" > Retour</a>

  </button>
</div>
</body>
</html>
