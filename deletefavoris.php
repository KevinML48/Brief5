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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="favoris.css"> 
    <title>Ajouter vos Favoris</title>
</head>
<body>

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

<?php // ce bout de code sert a afficher le tableau en direct a chaque ajout 
$pdo = new PDO('mysql:host=localhost;dbname=favoris', 'root', '');

$stmt = $pdo->query('SELECT t3.nom_liens,t3.desc_liens, t2.nom_categorie
                    FROM categ_liens AS t1
                    JOIN categorie AS t2
                    ON t2.id_categorie = t1.id_categorie
                    JOIN liens AS t3
                    ON t3.id=t1.id_liens 
                    ORDER BY 1'
                    );
$favoris = $stmt->fetchAll();

echo "<tbody>";
// la partie physique du tableau 
foreach ($favoris as $favori) { ?> 

    <?php echo "<tr>"; ?>
    <?php echo "<td>"; ?> <a href="<?= $favori['url_lien'] ?>" target="_blank"><?= $favori['nom_liens'] ?></a> <?php echo "</td>" ; ?>
    <?php echo "<td>"; ?> <?= $favori['desc_liens'] ?> <?php echo "</td>"; ?>
    <?php echo "<td>"; ?> <?= $favori['nom_categorie'] ?> <?php echo "</td>"; ?>
    <?php echo "<td>"; ?> <a class="btn btn-success btn-sm" href="edit.php">Edit</a>
    <?php echo "</tr>"; ?>

<?php } ?>;
<?php echo "</tbody>"; ?>
<?php echo "</table>"; ?>

    
    </p>
  </div>
</div>

<?php
include 'connexion/database.php'; 

if(isset($_POST['submit'])){
    $name=$_POST['id'];

    $sql = "DELETE FROM `liens` WHERE `nom_liens` = '$name'";
    $result = $db->prepare($sql)->execute();
    if($result){
        echo'Vous avez bien supprimé vos informations';
    }else{
        die(pdo_error($db));
    }
}
?>

<form method="post">
    <label >Name</label>
        <input type="text" class="form-control" placeholder="Entrer votre nom" name="id">
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <button type="button">
        <a href="http://localhost/Brief%205/index.php">Revenir</a>
    </button>
</form>
  </body>
</html>



