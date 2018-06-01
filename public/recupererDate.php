<?php
//Minimum date début
$statement = $connection->prepare("
SELECT *
FROM osi_offer
ORDER BY from_date
");
$statement->execute();
$datedebutbdd = $statement->fetchAll();
$mindatedebut = $datedebutbdd[0]['from_date'];

//Maximum date début
$statement = $connection->prepare("
SELECT *
FROM osi_offer
ORDER BY from_date DESC
");
$statement->execute();
$datedebutbdd = $statement->fetchAll();
$maxdatedebut = $datedebutbdd[0]['from_date'];

//Minimum date fin
$statement = $connection->prepare("
SELECT *
FROM osi_offer
ORDER BY to_date
");
$statement->execute();
$datedebutbdd = $statement->fetchAll();
$mindatefin = $datedebutbdd[0]['to_date'];

//Maximum date fin
$statement = $connection->prepare("
SELECT *
FROM osi_offer
ORDER BY to_date DESC
");
$statement->execute();
$datedebutbdd = $statement->fetchAll();
$maxdatefin = $datedebutbdd[0]['to_date'];
?>
