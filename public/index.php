<?php
session_start();

$_SESSION["RacineServ"] = dirname(dirname(__FILE__));; // Variable session pour avoir des liens qui débutent par la racine du serveur dans tout les fichiers

require_once($_SESSION["RacineServ"] . '/src/php/lienbdd.php');
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
                <th>Offre</th>
                <th>Type</th>
                <th>Niveau</th>
                <th>Description</th>
                <th>Période</th>
                <th>Date de début</th>
                <th>Date de fin</th>
            </tr>
            <?php
            for ($i = 0; $i < count($bddoffres); $i++)
            {
                print "<tr>";
                print "<td>" . $bddoffres[$i]['title'] . "</td>" . "\n";
                print "<td>" . $bddoffres[$i]['type'] . "</td>" . "\n";
                print "<td>" . $bddoffres[$i]['type'] . "</td>" . "\n";
                print "</td>";
            }
        ?>
        </tbody>
    </table>
</body>
</html>
