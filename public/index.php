<?php
session_start();

$_SESSION["RacineServ"] = dirname(dirname(__FILE__));; // Variable session pour avoir des liens qui débutent par la racine du serveur dans tout les fichiers

require_once($_SESSION["RacineServ"] . '/src/php/lienbdd.php');

if (isset ($_GET["tri"])) {
    switch ($_GET["tri"]) {
        case "offre":
            $statement = $connection->prepare("
        SELECT *
        FROM osi_offer
        ORDER BY title;
        ");
            $statement->execute();
            $bddoffres = $statement->fetchAll();
            break;
        case "type":
            $statement = $connection->prepare("
        SELECT *
        FROM osi_offer
        ORDER BY type;
        ");
            $statement->execute();
            $bddoffres = $statement->fetchAll();
            break;
        case "class":
            $statement = $connection->prepare("
        SELECT *
        FROM osi_offer
        ORDER BY class;
        ");
            $statement->execute();
            $bddoffres = $statement->fetchAll();
            break;
        case "periode":
            $statement = $connection->prepare("
        SELECT *
        FROM osi_offer
        ORDER BY period;
        ");
            $statement->execute();
            $bddoffres = $statement->fetchAll();
            break;
        case "debut":
            $statement = $connection->prepare("
        SELECT *
        FROM osi_offer
        ORDER BY from_date;
        ");
            $statement->execute();
            $bddoffres = $statement->fetchAll();
            break;
        case "fin":
            $statement = $connection->prepare("
        SELECT *
        FROM osi_offer
        ORDER BY to_date;
        ");
            $statement->execute();
            $bddoffres = $statement->fetchAll();
            break;
    }
}
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Index</title>
</head>

<body>
<table>
    <tbody>
    <tr>
        <th><a href="index.php?tri=offre">Offre</a></th>
        <th><a href="index.php?tri=type">Type</a></th>
        <th><a href="index.php?tri=niveau">Niveau</a></th>
        <th>Description</th>
        <th><a href="index.php?tri=periode">Période</a></th>
        <th><a href="index.php?tri=debut">Date de début</a></th>
        <th><a href="index.php?tri=fin">Date de fin</a></th>
    </tr>
    <?php
    for ($i = 0; $i < count($bddoffres); $i++) {
        print "<tr>";
        print "<td>" . $bddoffres[$i]['title'] . "</td>" . "\n";
        print "<td>" . $bddoffres[$i]['type'] . "</td>" . "\n";
        print "<td>" . $bddoffres[$i]['class'] . "</td>" . "\n";
        print "<td>" . $bddoffres[$i]['description'] . "</td>" . "\n";
        print "<td>" . $bddoffres[$i]['period'] . "</td>" . "\n";
        print "<td>" . $bddoffres[$i]['from_date'] . "</td>" . "\n";
        print "<td>" . $bddoffres[$i]['to_date'] . "</td>" . "\n";
        print "</tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>
