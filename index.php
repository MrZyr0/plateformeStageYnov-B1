<?php
    session_start();

    $_SESSION["RacineServ"] = __DIR__;                                              // Variable session pour avoir des liens qui débutent par la racine du serveur dans tout les fichiers

    require_once($_SESSION["RacineServ"].'/src/php/lienbdd.php');
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <pre>
            <?php print  $bddoffres[1]['title'];?>
        </pre>
    </body>
</html>
