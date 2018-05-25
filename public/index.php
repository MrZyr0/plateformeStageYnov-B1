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
            <?php
            for ($i = 0; $i < count($bddoffres); $i++)
            {
                print "<tr>";
                print "<th>" . $bddoffres[$i]['title'] . "</th>" . "\n";
                print "<th>" . "info" . "</th>" . "\n";
                print "</tr>";
            }
        ?>
        </tbody>
    </table>
</body>
</html>
