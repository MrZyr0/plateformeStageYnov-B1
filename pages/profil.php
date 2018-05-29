<?php
require_once($_SESSION["RacineServ"] . "/vendor/autoload.php");
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


<div>Contactez les étudiants</div>
<form method="post" action="">
    <label>E-mail</label>
    <input type="email" name="email"/>
    <br/>
    <label>Téléphone</label>
    <input type="tel" name="tel">
    <br/>
    <label>NOM Prénom</label>
    <input type="text" name="nom">
    <br/>
    <label>Nom de l'entreprise</label>
    <input type="text" name="entreprise">
    <br/>
    <label>Votre message</label>
    <textarea style="resize: none" name="message" rows="10" cols="50"></textarea>
    <br>
    <input type="submit" value="Envoyer"/>
</form>

</body>
</html>
