<?php
//Connexion base de données
$dsn = 'mysql:dbname=stageynov;host=127.0.0.1';
$user = 'root';
$password = '';

$connection = new PDO($dsn, $user, $password);
$statement = $connection->prepare("
    SELECT *
    FROM osi_offer_skill
");
$statement->execute();
$bddoffres_skills = $statement->fetchAll();
?>