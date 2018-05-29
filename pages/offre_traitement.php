<?php
require_once($_SESSION["RacineServ"] . "/vendor/autoload.php");

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
    ->setBody("De l'entreprise ". $_POST["entreprise"] ." : \n" . $_POST["message"] . "\nContactez l'entreprise au " . $_POST["tel"]);

// Send the message
$result = $mailer->send($message);
?>
