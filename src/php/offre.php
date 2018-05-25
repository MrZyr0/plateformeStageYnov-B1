<?php
session_start();
require_once $_SESSION["RacineServ"].'/vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465))
    ->setUsername('stageynov@gmail.com')
    ->setPassword('F0rtnitevie')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Paie moi 5€'))
    ->setFrom(['john@doe.com' => 'John Doe'])
    ->setTo(['john.mysterio@hotmail.fr', 'other@domain.org' => 'Gianni'])
    ->setBody('Paie moi un café')
;

// Send the message
$result = $mailer->send($message);
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Contact</title>
</head>
<body>
<div>Contactez les étudiants</div>
<form action="" method="post">

</form>
</body>
</html>
