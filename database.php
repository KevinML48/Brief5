
<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=favoris;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    echo 'Connexion ratée';
    die('Erreur : ' . $e->getMessage());
}
?>
