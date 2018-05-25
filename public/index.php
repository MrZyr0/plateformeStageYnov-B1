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

    <div class="header">

    </div>

    <div class="filter">
        <div class="filter__skill">
            <input type="checkbox" name="filter__skill-1" value="PHP"></br>
            <input type="checkbox" name="filter__skill-2" value="Ergonomie"></br>
            <input type="checkbox" name="filter__skill-3" value="SEO"></br>
            <input type="checkbox" name="filter__skill-4" value="Symphony"></br>
            <input type="checkbox" name="filter__skill-5" value="Node.js"></br>
        </div>
        <div class="filter__type">
            <input type="checkbox" name="filter__type-1" value="Stage">
            <input type="checkbox" name="filter__type-2" value="Alternance">
        </div>
        <div class="filter__level">
            <input type="checkbox" name="filter__level-1" value="B1">
            <input type="checkbox" name="filter__level-2" value="B2">
            <input type="checkbox" name="filter__level-3" value="B3">
            <input type="checkbox" name="filter__level-4" value="M1">
            <input type="checkbox" name="filter__level-5" value="M2">
        </div>
        <div class="filter_date">
            <div data-role="rangeslider">
                <label for="price-min">Price:</label>
                <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
                <label for="price-max">Price:</label>
                <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
            </div>
        </div>
    </div>

    <table class="offreTable">
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
