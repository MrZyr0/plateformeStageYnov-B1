<?php
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
    <title>Liste profils</title>
    <link rel="stylesheet" href="/css/master.css">
    <link rel="shortcut icon"
          href="https://www.ynov.com/wp-content/themes/ynov/assets/images/favicons/favicon-32x32.png">
</head>

<body>
<nav class="nav">
    <a href="/"><img src="/img/icons/prj_ynov.png" alt="Logo du Campus Ynov de Lyon" class="nav__logo"></a>
    <div class="nav__menu">
        <a href="http://www.ynovlyon.com/fr/">YNOV LYON</a>
        <a href="http://www.ynovlyon.com/fr/">FORMATIONS</a>
        <a href="http://www.ynovlyon.com/fr/">ENTREPRISES</a>
        <a href="http://www.ynovlyon.com/fr/actualites/">BLOG</a>
        <a href="http://www.ynovlyon.com/fr/candidater/" class="nav__menu__canditate">Candidater</a>
        <a href="#"></a>
    </div>
</nav>

<header class="header">
    <img src="/img/illustrations/illustration-recrutement.jpg" alt="Image d'illustration de la page"
         class="header__illustration">
    <h1 class="header__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
        anim id est laborum.</h1>
</header>

<form class="filter-form" action="#" method="post">
    <div class="filter-form__when">
        <p class="filter-form__when__label">Quand ?</p>
        <select class="filter-form__when__select">
            <option value="now" selected>Maintenant</option>
            <option value="1m">dans 1 mois</option>
            <option value="6m">dans 6 mois</option>
            <option value="1y">dans 1 an</option>
        </select>
    </div>


    <div class="filter-form__domain">
        <p class="filter-form__domain__label">Quel domaine ?</p>
        <select class="filter-form__domain__select">
            <option value="info" selected>Informatique</option>
            <option value="art">Art</option>
            <option value="commercial">commercial</option>
        </select>
    </div>

    <div class="filter-form__contract">
        <p class="filter-form__contract__label">Quel contrat ?</p>
        <select class="filter-form__contract__select">
            <option value="stage" selected>Stage</option>
            <option value="alternance">Alternance</option>
            <option value="cdi">CDI</option>
            <option value="cdd">CDD</option>
        </select>
    </div>

    <input type="text" name="keywords" value="" placeholder="Visez une spécialité" class="filter-form__keywords">
    <button type="submit" name="button" class="filter-form__button">
        <img src="/img/icons/search.png" alt="Effectuer la recherche" class="filter-form__button-search">
    </button>
</form>


<div class="profil-container">
    <?php for ($i = 1; $i < count($bddoffres)+1; $i++) {
        $statement = $connection->prepare("
        SELECT *
        FROM osi_offer
        WHERE id = $i;
        ");
        $statement->execute();
        $offre = $statement->fetchAll();
    ?>
    <div class="profil-card">
        <div class="profil-card__header-container">
            <?php
            switch ($offre[0]['categorie'])
            {
                case 'informatique':
                case 'ingesup':
                case 'ingésup':
                    print '<img src="/img/icons/picto-school/ingesup/code.png" alt="Pictograme de la filière" >';
                    break;

                case 'business':
                case 'digital business':
                case 'digital':
                    print '<img src="/img/icons/picto-school/isee/picto_ynov_digital_communication.png" alt="Pictograme de la filière">';
                    break;

                case 'aeronautique':
                    print '<img src="/img/icons/picto-school/aeronautique/rocket.png" alt="Pictograme de la filière">';
                    break;

                case 'jeux video':
                case 'jeux vidéo':
                case 'jeux videos':
                case 'jeux vidéos':
                case 'jeux':
                case 'animation':
                case 'animation 3d':
                    print '<img src="/img/icons/picto-school/game/picto_ynov_jeuxvideo_pad.png" alt="Pictograme de la filière">';
                    break;

                case 'audiovisuel':
                    print '<img src="/img/icons/picto-school/audiovisuel/picto_ynov_audiovisuel_clap.png" alt="Pictograme de la filière">';
                    break;

                case 'webcom':
                    print '<img src="/img/icons/picto-school/web/picto_ynov_webcom_responsiv.png" alt="Pictograme de la filière">';
                    break;

                default:
                    print '<img src="/img/icons/picto-school/ingesup/code.png" alt="Pictograme de la filière">';
                    break;
            }
            ?>
            <?php
            switch ($offre[0]['categorie'])
            {
                case 'informatique':
                case 'ingesup':
                case 'ingésup':
                    print '<img src="/img/icons/logo-school/ingesup.png" height="70px" class="imgynov" alt="logo ynov informatique" class="profil-card__logo">';
                    break;

                case 'business':
                case 'digital business':
                case 'digital':
                    print '<img src="/img/icons/logo-school/isee.png" height="70px" class="imgynov" alt="logo ynov digital business school" class="profil-card__logo">';
                    break;

                case 'aeronautique':
                    print '<img src="/img/icons/logo-school/aeronautique.png" height="70px" class="imgynov" alt="logo ynov aeronautique" class="profil-card__logo">';
                    break;

                case 'jeux video':
                case 'jeux vidéo':
                case 'jeux videos':
                case 'jeux vidéos':
                case 'jeux':
                case 'animation':
                case 'animation 3d':
                    print '<img src="/img/icons/logo-school/game.png" height="70px" class="imgynov" alt="logo ynov game" class="profil-card__logo">';
                    break;

                case 'audiovisuel':
                    print '<img src="/img/icons/logo-school/audiovisuel.png" height="70px" class="imgynov" alt="logo ynov audiovisuel" class="profil-card__logo">';
                    break;

                case 'webcom':
                    print '<img src="/img/icons/logo-school/web.png" height="70px" class="imgynov" alt="logo ynov webcom" class="profil-card__logo">';
                    break;

                default:
                    print '<img src="/img/icons/logo-school/ynov.png" height="70px" class="imgynov" alt="logo ynov" class="profil-card__logo">';
                    break;
            }
            ?>
        </div>

        <h2 class="profil-card__title"><a href="recrutement/profil/<?= $i ?>"><?= $offre[0]['title'] ?></a></h2>

        <div class="profil-card__keywords-container">
            <?php
            $statement = $connection->prepare("
             SELECT s.* FROM `osi_skill` s JOIN osi_offer_skill os ON os.skill_id = s.id AND os.offer_id = $i;
             ");
            $statement->execute();
            $skills = $statement->fetchAll();
            for ($j = 0; $j < count($skills); $j++) {
                print '<span class="profil-card__keywords-container__keywords">' . $skills[$j]['title'] . "</span>";
            }
            ?>
        </div>

        <p class="profil-card__desc">
            <?= mb_strimwidth($offre[0]['description'], 0, 200, "...");?>
        </p>

    </div>
    <?php }?>
</div>
<!-- <table class="offreTable">
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
// for ($i = 0; $i < count($bddoffres); $i++)
// {
//     print "<tr>";
//     print "<td><a href='/recrutement/profil/" . $bddoffres[$i]['id'] . "'>" . $bddoffres[$i]['title'] . "</a></td>" . "\n";
//     print "<td>" . $bddoffres[$i]['type'] . "</td>" . "\n";
//     print "<td>" . $bddoffres[$i]['class'] . "</td>" . "\n";
//     print "<td>" . mb_strimwidth($bddoffres[$i]['description'],0,200,"<a href='/recrutement/profil/" . $bddoffres[$i]['id'] . "'>" . "..." . "</a></td>" . "\n");
//     print "<td>" . $bddoffres[$i]['period'] . "</td>" . "\n";
//     print "<td>" . $bddoffres[$i]['from_date'] . "</td>" . "\n";
//     print "<td>" . $bddoffres[$i]['to_date'] . "</td>" . "\n";
//     print "</tr>";
// }
?>
        </tbody>
    </table> -->

<img src="/img/footer.png" alt="fouter">
</body>
</html>
