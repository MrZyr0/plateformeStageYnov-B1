<?php
require_once($_SESSION["RacineServ"] . "/vendor/autoload.php");
require_once($_SESSION["RacineServ"] . '/src/php/lienbdd.php');
if (isset($_POST['email'])) {
    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('stageynov@gmail.com')
    ->setPassword('F0rtnitevie');

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message('Contactez nos étudiants'))
    ->setFrom([$_POST["email"] => $_POST["nom"]])
    ->setTo(["stageynov@gmail.com"])
    ->setBody("De l'entreprise " . $_POST["entreprise"] . " : \n" . $_POST["message"] . "\nContactez l'entreprise au " . $_POST["tel"] . " ou à cette adresse: " . $_POST["email"]);

    // Send the message
    $result = $mailer->send($message);
}

$statement = $connection->prepare("
SELECT *
FROM osi_offer
WHERE id = $idProfil;
");
$statement->execute();
$offre = $statement->fetchAll();
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/profil.css">
    <link rel="shortcut icon" href="https://www.ynov.com/wp-content/themes/ynov/assets/images/favicons/favicon-32x32.png">
    <title><?= $offre[0]['title'] ?></title>
</head>
<body>
    <nav class="nav">
        <a href="/"><img src="/img/icons/prj_ynov.png" alt="Logo du Campus Ynov de Lyon" class="nav__logo"></a>
        <div class="nav__menu">
            <a href="http://www.ynovlyon.com/fr/">YNOV LYON</a>
            <a href="http://www.ynovlyon.com/fr/">FORMATIONS</a>
            <a href="http://www.ynovlyon.com/fr/">ENTREPRISES</a>
            <a href="http://www.ynovlyon.com/fr/actualites/">BLOG</a>
            <a href="http://www.ynovlyon.com/fr/candidater/" class="nav__menu__canditate">CANDIDATER</a>
            <a href="http://www.ynovlyon.com/fr/nous-contacter/">CONTACT</a>
        </div>
    </nav>

    <section class="container">
            <div class="profile-card">
                <div class="profile-card__col1">
                    <a href="/"><img src="/img/icons/expand_arrow_64px.png" alt="Retour"></a>
                    <div clas="image">
                        <?php
                        switch ($offre[0]["categorie"])
                        {
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
                        ?>
                    </div>
                    <div class="class">
                        <h2>CLASSE</h2>
                        <p class="info"><?php print $offre[0]['class'] ?></p>
                    </div>
                    <div class="type">
                        <h2>TYPE</h2>
                        <p class="info"><?php print $offre[0]['type'] ?></p>
                    </div>
                    <div class="debut">
                        <h2>DEBUT</h2>
                        <p class="info"><?php print $offre[0]['from_date'] ?></p>
                    </div>
                    <div class="fin">
                        <h2>FIN</h2>
                        <p class="info"><?php print $offre[0]['to_date'] ?></p>
                    </div>
                    <div class="fin">
                        <h2>PERIODE</h2>
                        <p class="info"><?php print $offre[0]['period'] ?></p>
                    </div>
                </div>

                <div class="profile-card__col2">
                    <div class="content">
                        <h1>Détaille du profil</h1>
                        <h2><?= $offre[0]['title'] ?></h2>
                        <div class="description">
                            <h3>PROFIL DE NOS ETUDIANTS</h3>
                            <?php print $offre[0]['description'] ?>
                        </div>
                        <div class="competences">
                            <h2>COMPETENCES</h2>
                            <?php
                            $statement = $connection->prepare("
                            SELECT s.* FROM `osi_skill` s JOIN osi_offer_skill os ON os.skill_id = s.id AND os.offer_id = $idProfil;
                            ");
                            $statement->execute();
                            $skills = $statement->fetchAll();
                            for ($i = 0; $i < count($skills); $i++) {
                                print $skills[$i]['title'] . " ";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact">
                <div>Contactez les étudiants</div>
                <form method="post" action="">
                    <input type="email" name="email" placeholder="E-mail" required>
                    <br/>
                    <input type="tel" name="tel" placeholder="Téléphone" >
                    <br/>
                    <input type="text" name="nom" placeholder="NOM" required>
                    <br/>
                    <input type="text" name="entreprise" placeholder="Nom de l'entreprise" required>
                    <br/>
                    <textarea style="resize: none" name="message" rows="10" cols="50" placeholder="Votre message" required>
                    </textarea>
                    <br>
                    <input type="submit" value="Envoyer"/>
                </form>
            </div>

    </section>
    <img src="/img/footer.png" alt="fouter" class="footer">
</body>
</html>
