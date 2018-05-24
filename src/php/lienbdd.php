<?php
//Connexion base de données
$dsn = 'mysql:dbname=stageynov;host=127.0.0.1';
$user = 'root';
$password = '';

$connection = new PDO($dsn, $user, $password);
$connection->exec("SET CHARACTER SET utf8");

//Table offre
$statement = $connection->prepare("
    SELECT *
    FROM osi_offer
");
$statement->execute();
$bddoffres = $statement->fetchAll();

//Table offre skill
$statement = $connection->prepare("
    SELECT *
    FROM osi_offer_skill
");
$statement->execute();
$bddoffres_skills = $statement->fetchAll();

//Table skill
$statement = $connection->prepare("
    SELECT *
    FROM osi_skill
");
$statement->execute();
$bddskills = $statement->fetchAll();
?>