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
        ->setFrom(['stageynov@gmail.com'])
        ->setTo([$_POST["email"] => $_POST["nom"]])
        ->setBody("De l'entreprise " . $_POST["entreprise"] . " : \n" . $_POST["message"] . "\nContactez l'entreprise au " . $_POST["tel"]);

    // Send the message
    $result = $mailer->send($message);
}
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Profil <?= $idProfil ?></title>
</head>
<body>
<h1>Voici le profil n°<?= $idProfil ?></h1>
<div class="contact">
    <div>Contactez les étudiants</div>
    <form method="post" action="">
        <label>E-mail</label>
        <input type="email" name="email" required>
        <br/>
        <label>Téléphone</label>
        <input type="tel" name="tel" required>
        <br/>
        <label>NOM Prénom</label>
        <input type="text" name="nom">
        <br/>
        <label>Nom de l'entreprise</label>
        <input type="text" name="entreprise" required>
        <br/>
        <label>Votre message</label>
        <textarea style="resize: none" name="message" rows="10" cols="50" required></textarea>
        <br>
        <input type="submit" value="Envoyer"/>
    </form>
</div>

<div class="content">
    <div class="description">
        <h2>DESCRIPTION</h2>
        <?php print $bddoffres[$idProfil]['description'] ?>
    </div>
    <div class="competences">
        <h2>COMPETENCES</h2>
        <?php print $bddoffres[$idProfil]['competences'] ?>
    </div>
    <div class="technologies">
        <h2>TECHNOLOGIES UTILISEES</h2>
        <?php
        $statement = $connection->prepare("
        SELECT s.* FROM `osi_skill` s JOIN osi_offer_skill os ON os.skill_id = s.id AND os.offer_id = $idProfil;
        ");
        $statement->execute();
        $skills = $statement->fetchAll();
        for ($i = 0; $i < count($skills); $i++){
            print $skills[$i]['title']. " ";
        }
        ?>
    </div>
</div>
<div class="profil">
    <div class="type">
        <h2><?php print strtoupper($bddoffres[$idProfil]['type']) ?></h2>
    </div>
    <div class="debut">
        <h2>DEBUT</h2>
        <br>
        <?php print $bddoffres[$idProfil]['from_date'] ?>
    </div>
    <div class="fin">
        <h2>FIN</h2>
        <br>
        <?php print $bddoffres[$idProfil]['to_date'] ?>
    </div>
    <div class="fin">
        <h2>PERIODE</h2>
        <br>
        <?php print $bddoffres[$idProfil]['period'] ?>
    </div>
</div>
</body>
</html>
