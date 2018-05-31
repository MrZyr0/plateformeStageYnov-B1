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
    <title><?= $offre[0]['title'] ?></title>
</head>
<body>
    <h1><?= $offre[0]['title'] ?></h1>
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
                switch ($offre[0]['categorie'])
                {
                    case 'informatique':
                    case 'ingesup':
                    case 'ingésup':
                        print '<img src="/img/icons/logo-school/ingesup.png" height="70px" class="imgynov" alt="logo ynov informatique">';
                    break;

                    case 'business':
                    case 'digital business':
                    case 'digital':
                        print '<img src="/img/icons/logo-school/isee.png" height="70px" class="imgynov" alt="logo ynov digital business school">';
                    break;

                    case 'aeronautique':
                        print '<img src="/img/icons/logo-school/aeronautique.png" height="70px" class="imgynov" alt="logo ynov aeronautique">';
                    break;

                    case 'jeux video':
                    case 'jeux vidéo':
                    case 'jeux videos':
                    case 'jeux vidéos':
                    case 'jeux':
                    case 'animation':
                    case 'animation 3d':
                        print '<img src="/img/icons/logo-school/game.png" height="70px" class="imgynov" alt="logo ynov game">';
                    break;

                    case 'audiovisuel':
                        print '<img src="/img/icons/logo-school/audiovisuel.png" height="70px" class="imgynov" alt="logo ynov audiovisuel">';
                        break;

                    case 'webcom':
                        print '<img src="/img/icons/logo-school/web.png" height="70px" class="imgynov" alt="logo ynov webcom">';
                        break;

                    default:
                        print '<img src="/img/icons/logo-school/ynov.png" height="70px" class="imgynov" alt="logo ynov">';
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
    </body>
    </html>
