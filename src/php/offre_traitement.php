<?php
session_start();
require_once $_SESSION["RacineServ"] . '/vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('stageynov@gmail.com')
    ->setPassword('F0rtnitevie');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Contactez nos étudiants'))
    ->setFrom(['stageynov@gmail.com' => 'Offres Ynov'])
    ->setTo(['john.mysterio@hotmail.fr' => 'Gianni'])
    ->setBody('Voici la liste de nos étudiants.');

// Send the message
$result = $mailer->send($message);
?>
