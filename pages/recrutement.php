<?php require_once($_SESSION["RacineServ"] . "/src/php/lienbdd.php"); ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Liste profils - recrutement - Lyon Ynov Campus</title>

    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/recrutement.css">
    <link rel="shortcut icon"
          href="https://www.ynov.com/wp-content/themes/ynov/assets/images/favicons/favicon-32x32.png">

    <meta name="google-site-verification" content="1_DIXFM6ZghuayF4pZev37YKzptCEDRhEvZdN-nmhKU"/>
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
        <a href="http://www.ynovlyon.com/fr/nous-contacter/">CONTACT</a>
        <a href="administration">ADMINISTRATION</a>
    </div>
</nav>

<header class="header">
    <img src="/img/illustrations/illustration-recrutement.jpg" alt="Image d'illustration de la page"
         class="header__illustration">
    <h1 class="header__text">Découvrez nos <b>talents</b> !</br><em>Stage</em>, <em>Alternance</em>, <em>CDI</em>, <em>CDD</em>
        ...</br>Trouvez les profils dont vous avez besoin pour votre entreprise</h1>
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
            <option value="aeronautique">aeronautique</option>
            <option value="audiovisuel">audiovisuel</option>
            <option value="games">Jeux Video</option>
            <option value="web">web</option>
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
    <?php
    for ($nbProfilAff = 1; $nbProfilAff < count($bddoffres) + 1; $nbProfilAff)    // Pour le nb de profils dispo
    {
        print "<div class=\"profil-container__ligne\">";

        for ($nbProfilAffLine = 0; $nbProfilAffLine < 4; $nbProfilAffLine++) {
            $statement = $connection->prepare("
                SELECT *
                FROM osi_offer
                WHERE id = $nbProfilAff;
                ");
            $statement->execute();
            $offre = $statement->fetchAll();

            print "<div class=\"profil-card\">";
            print "<div class=\"profil-card__header-container\">";
            switch ($offre[0]["categorie"]) {
                case "informatique":
                case "ingesup":
                case "ingésup":
                    print "<img src=\"/img/icons/picto-school/ingesup/code.svg\" alt=\"Pictograme de la filière\" class=\"profil-card__picto\">";
                    break;

                case "business":
                case "digital business":
                case "digital":
                    print "<img src=\"/img/icons/picto-school/isee/communication.svg\" alt=\"Pictograme de la filière\" class=\"profil-card__picto\">";
                    break;

                case "aeronautique":
                    print "<img src=\"/img/icons/picto-school/aeronautique/rocket.svg\" alt=\"Pictograme de la filière\" class=\"profil-card__picto\">";
                    break;

                case "jeux video":
                case "jeux vidéo":
                case "jeux videos":
                case "jeux vidéos":
                case "jeux":
                case "animation":
                case "animation 3d":
                    print "<img src=\"/img/icons/picto-school/game/pad.svg\" alt=\"Pictograme de la filière\" class=\"profil-card__picto\">";
                    break;

                case "audiovisuel":
                    print "<img src=\"/img/icons/picto-school/audiovisuel/clap.svg\" alt=\"Pictograme de la filière\" class=\"profil-card__picto\">";
                    break;

                case "webcom":
                    print "<img src=\"/img/icons/picto-school/web/idea.svg\" alt=\"Pictograme de la filière\" class=\"profil-card__picto\">";
                    break;

                default:
                    print "<img src=\"/img/icons/picto-school/ingesup/code.svg\" alt=\"Pictograme de la filière\" class=\"profil-card__picto\">";
                    break;
            }
            switch ($offre[0]["categorie"]) {
                case "informatique":
                case "ingesup":
                case "ingésup":
                    print "<img src=\"/img/icons/logo-school/ingesup.svg\" class=\"profil-card__logo\" alt=\"logo ynov informatique\" class=\"profil-card__logo\" class=\"profil-card__picto\">";
                    break;

                case "business":
                case "digital business":
                case "digital":
                    print "<img src=\"/img/icons/logo-school/digital_business_school.svg\" class=\"profil-card__logo\" alt=\"logo ynov digital business school\" class=\"profil-card__logo\">";
                    break;

                case "aeronautique":
                    print "<img src=\"/img/icons/logo-school/aeronautique_et_systemes_embarques.svg\" class=\"profil-card__logo\" alt=\"logo ynov aeronautique\" class=\"profil-card__logo\">";
                    break;

                case "jeux video":
                case "jeux vidéo":
                case "jeux videos":
                case "jeux vidéos":
                case "jeux":
                case "animation":
                case "animation 3d":
                    print "<img src=\"/img/icons/logo-school/animation_3D_jeux_video.svg\" class=\"profil-card__logo\" alt=\"logo ynov game\" class=\"profil-card__logo\">";
                    break;

                case "audiovisuel":
                    print "<img src=\"/img/icons/logo-school/audiovisuel.svg\" class=\"profil-card__logo\" alt=\"logo ynov audiovisuel\" class=\"profil-card__logo\">";
                    break;

                case "webcom":
                    print "<img src=\"/img/icons/logo-school/web_com_et_graphic_design.svg\" class=\"profil-card__logo\" alt=\"logo ynov webcom\" class=\"profil-card__logo\">";
                    break;

                default:
                    print "<img src=\"/img/icons/logo-school/bachelors.svg\" class=\"profil-card__logo\" alt=\"logo ynov\" class=\"profil-card__logo\">";
                    break;
            }
            print "</div>";
            print "<h2 class=\"profil-card__title\"><a href=\"recrutement/profil/$nbProfilAff\" class=\"profil-card__title__link\">" . $offre[0]["title"] . "</a></h2>";
            print "<div class=\"profil-card__keywords-container\">";

            $statement = $connection->prepare("SELECT s.* FROM `osi_skill` s JOIN osi_offer_skill os ON os.skill_id = s.id AND os.offer_id = $nbProfilAff;");
            $statement->execute();
            $skills = $statement->fetchAll();
            for ($j = 0; $j < count($skills); $j++) {
                print "<h3 class=\"profil-card__keywords-container__keywords\">" . $skills[$j]["title"] . "</h3>";
            }

            print "</div>";
            print "<p class=\"profil-card__desc\">" . mb_strimwidth($offre[0]["description"], 0, 200, "...") . "</p>";
            print "</div>";


            $nbProfilAff++;
            if ($nbProfilAff == count($bddoffres) + 1) {
                break;
            }
        }
        print "</div>";
    }
    ?>
</div>

<img src="/img/footer.png" alt="fouter" class="footer">
</body>
</html>
