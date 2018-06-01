<?php
require_once($_SESSION["RacineServ"] . '/src/php/lienbdd.php');

$statement = $connection->prepare("
    INSERT INTO `osi_offer` (`id`, `title`, `type`, `class`, `period`, `from_date`, `to_date`, `categorie`, `description`)
    VALUES ($_POST[id], $_POST[title], $_POST[type], $_POST[class], $_POST[period], $_POST[from_date], $_POST[to_date], $_POST[categorie], $_POST[description]");
$statement->execute();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
</head>
<body>
<form method="post" action="">
    <input type="number" name="id" placeholder="id" >
    <br/>
    <input type="text" name="title" placeholder="Titre" required>
    <br/>
    <input type="text" name="type" placeholder="Type" required>
    <br/>
    <input type="text" name="class" placeholder="Classe" required>
    <br/>
    <input type="text" name="period" placeholder="Période" required>
    <br/>
    <input type="date" name="from_date" placeholder="Du" required>
    <br/>
    <input type="date" name="to_date" placeholder="Au" required>
    <br/>
    <input type="text" name="categorie" placeholder="Catégorie" required>
    <br/>
    <textarea style="resize: none" name="description" rows="10" cols="50" placeholder="Description de l'offre:" required>
    </textarea>
    <br>
    <input type="submit" value="Envoyer"/>
</form>
</body>
</html>
