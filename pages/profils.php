<?php

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
    <form method="post" action="offre_traitement.php">
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
        <textarea name="message" rows="10" cols="50"></textarea>
        <br>
        <input type="submit" value="Envoyer" />
    </form>

    </body>
</html>
