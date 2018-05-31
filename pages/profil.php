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
                <h1><?= $offre[0]['title'] ?></h1>

                <div class="content">
                    <div class="description">
                        <h2>PROFIL DE NOS ETUDIANTS</h2>
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
                <div class="profil">
                    <div clas="image">
                        <?php
                        switch ($offre[0]['class'])
                        {
                            case 'ingesup':
                            print '<img src="/img/icons/logo-school/ingesup.png" height="70px" class="imgynov" alt="logo ynov informatique">';
                            break;

                            case 'isee':
                            print '<img src="/img/icons/logo-school/isee.png" height="70px" class="imgynov" alt="logo ynov informatique">';
                            break;

                            case 'aeronautique':
                            print '<img src="/img/icons/logo-school/aeronautique.png" height="70px" class="imgynov" alt="logo ynov informatique">';
                            break;

                            case 'jeuxvideo':
                            print '<img src="/img/icons/logo-school/game.png" height="70px" class="imgynov" alt="logo ynov informatique">';
                            break;

                            default:
                            print '<img src="/img/icons/logo-school/ynov.png" height="70px" class="imgynov" alt="logo ynov informatique">';
                            break;
                        }
                        ?>
                    </div>
                    <div class="class">
                        <h2>CLASSE</h2>
                        <?php print $offre[0]['class'] ?>
                    </div>
                    <div class="type">
                        <h2>TYPE</h2>
                        <?php print $offre[0]['type'] ?>
                    </div>
                    <div class="debut">
                        <h2>DEBUT</h2>
                        <?php print $offre[0]['from_date'] ?>
                    </div>
                    <div class="fin">
                        <h2>FIN</h2>
                        <?php print $offre[0]['to_date'] ?>
                    </div>
                    <div class="fin">
                        <h2>PERIODE</h2>
                        <?php print $offre[0]['period'] ?>
                    </div>
                </div>
            </div>
            <div class="contact">
                <div>Contactez les étudiants</div>
                <form method="post" action="">
                    <input type="email" name="email" placeholder="E-mail" required>
                    <br/>
                    <input type="tel" name="tel" placeholder="Téléphone" required>
                    <br/>
                    <input type="text" name="nom" placeholder="NOM" required>
                    <br/>
                    <input type="text" name="entreprise" placeholder="Nom de l'entreprise" required>
                    <br/>
                    <textarea style="resize: none" name="message" rows="10" cols="50" placeholder="Votre message"
                    required></textarea>
                    <br>
                    <input type="submit" value="Envoyer"/>
                </form>
            </div>

    </section>
    <img src="/img/footer.png" alt="fouter">
</body>
</html>
