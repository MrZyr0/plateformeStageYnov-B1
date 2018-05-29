<?php
require_once($_SESSION["RacineServ"] . '/src/php/lienbdd.php');

if (isset ($_GET["tri"]))
{
    switch ($_GET["tri"])
    {
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
    <title>Liste profils</title>
    <link rel="stylesheet" href="/css/master.css">
</head>

<body>
    <nav class="nav">
        <a href="/"><img src="http://www.ynovlyon.com/wp-content/themes/ynov/assets/img/global/logo-ynov-white.png" alt="YNOV Lyon - Ynov Lyon"></a>
        <a href="/"></a>
    </nav>

    <header class="header">
        <img src="/img/background/atelier-293x125.jpg" alt="Image d'illustration de la page" class="header__illustration">
    </header>

    <form class="filter-form" action="#" method="post">
        <span class="filter-form__when">
            <label class="filter-form__when__label" for="toggle-open"><p>Maintenant</p><img src="/img/icons/expand_arrow_64px.png" class="filter__when__label__arrow"></label>
            <input id="toggle-open" name="toggle-open" type="checkbox" hidden/>

        </span>

        <input type="submit" name="search" value="Rechercher">
    </form>

    <table class="offreTable">
        <tbody>
            <tr>
                <th><a href="?tri=offre">Offre</a></th>
                <th><a href="?tri=type">Type</a></th>
                <th><a href="?tri=niveau">Niveau</a></th>
                <th>Description</th>
                <th><a href="?tri=periode">Période</a></th>
                <th><a href="?tri=debut">Date de début</a></th>
                <th><a href="?tri=fin">Date de fin</a></th>
            </tr>

            <?php
                for ($i = 0; $i < count($bddoffres); $i++)
                {
                    print "<tr>";
                    print "<td><a href='/recrutement/profil/" . $bddoffres[$i]['id'] . "'>" . $bddoffres[$i]['title'] . "</a></td>" . "\n";
                    print "<td>" . $bddoffres[$i]['type'] . "</td>" . "\n";
                    print "<td>" . $bddoffres[$i]['class'] . "</td>" . "\n";
                    print "<td>" . mb_strimwidth($bddoffres[$i]['description'],0,200,"<a href='/recrutement/profil/" . $bddoffres[$i]['id'] . "'>" . "..." . "</a></td>" . "\n");
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
