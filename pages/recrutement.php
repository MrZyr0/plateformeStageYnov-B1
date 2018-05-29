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
    <script type="text/javascript" src="/js/slider.js"></script>
</head>

<body>
    <header class="header">
        <a href="/"><img src="http://www.ynovlyon.com/wp-content/themes/ynov/assets/img/global/logo-ynov-white.png" alt="YNOV Lyon - Ynov Lyon"></a>
        <a href="/"></a>
    </header>

    <form class="filter" action="#" method="post">
        <div class="filter__skill">
            <input type="checkbox" name="filter__skill-1" value="PHP"></br>
            <input type="checkbox" name="filter__skill-2" value="Ergonomie"></br>
            <input type="checkbox" name="filter__skill-3" value="SEO"></br>
            <input type="checkbox" name="filter__skill-4" value="Symphony"></br>
            <input type="checkbox" name="filter__skill-5" value="Node.js"></br>
        </div>

        <div class="filter__type">
            <input type="checkbox" name="filter__type-1" value="Stage"></br>
            <input type="checkbox" name="filter__type-2" value="Alternance"></br>
        </div>

        <div class="filter__level">
            <input type="checkbox" name="filter__level-1" value="B1"></br>
            <input type="checkbox" name="filter__level-2" value="B2"></br>
            <input type="checkbox" name="filter__level-3" value="B3"></br>
            <input type="checkbox" name="filter__level-4" value="M1"></br>
            <input type="checkbox" name="filter__level-5" value="M2"></br>
        </div>

        <div class="filter_date">
            <div class="filter-date__begin">
                <input type="date" max=<?= "2018-05-28" ?> min="2011-08-13" name="the_date">
            </div>

            <div class="filter-date__end">
                <input type="date" max="2012-06-25" min="2011-08-13" name="the_date">
            </div>
        </div>
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
                    print "<td><a href='/recrutement/profils/" . $bddoffres[$i]['id'] . "'>" . $bddoffres[$i]['title'] . "</a></td>" . "\n";
                    print "<td>" . $bddoffres[$i]['type'] . "</td>" . "\n";
                    print "<td>" . $bddoffres[$i]['class'] . "</td>" . "\n";
                    print "<td>" . mb_strimwidth($bddoffres[$i]['description'],0,200,"<a href='/recrutement/profils/" . $bddoffres[$i]['id'] . "'>" . "..." . "</a></td>" . "\n");
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
