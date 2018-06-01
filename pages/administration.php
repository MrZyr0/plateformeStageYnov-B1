<?php
require_once($_SESSION["RacineServ"] . '/src/php/lienbdd.php');

if (isset($_POST['title'])) {
    $statement = $connection->prepare('INSERT INTO `osi_offer` (`id`, `title`, `type`, `class`, `description`, `period`, `from_date`, `to_date`, `categorie`) 
    VALUES (:id, :title, :type, :class, :description, :period, :from_date, :to_date, :categorie)');
    $statement->bindValue(':id', $_POST["id"]);
    $statement->bindValue(':title', $_POST["title"]);
    $statement->bindValue(':type', $_POST["type"]);
    $statement->bindValue(':class', $_POST["class"]);
    $statement->bindValue(':description', $_POST["description"]);
    $statement->bindValue(':period', $_POST["period"]);
    $statement->bindValue(':from_date', $_POST["from_date"]);
    $statement->bindValue(':to_date', $_POST["to_date"]);
    $statement->bindValue(':categorie', $_POST["categorie"]);
    $statement->execute();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/administration.css">
    <title>Administration</title>
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
<section class="section">
    <form method="post" action="">
        <div class="offre">AJOUTER UNE OFFRE:
            <input type="number" name="id" placeholder="id">
            <br/>
            <input type="text" name="title" placeholder="Titre" required>
            <br/>
            <input type="text" name="type" placeholder="Type" required>
            <br/>
            <input type="text" name="class" placeholder="Classe" required>
            <br/>
            <input type="text" name="period" placeholder="Période" required>
            <br/>
            <input type="date" name="from_date" placeholder="Du" required>
            <br/>
            <input type="date" name="to_date" placeholder="Au" required>
            <br/>
            <input type="text" name="categorie" placeholder="Catégorie" required>
            <br/>
            <textarea style="resize: none" name="description" rows="10" cols="50" placeholder="Description de l'offre:"
                      required>
    </textarea>
            <br>
            <input type="submit" value="Envoyer"/>
        </div>
        <div>SUPPRIMER UNE OFFRE</div>
        <?php for ($i = 0; $i < count($bddoffres); $i++) {
            print $bddoffres[$i]['title'] . " " . $bddoffres[$i]['type'] . " " . $bddoffres[$i]['class'] . " " . mb_strimwidth($bddoffres[$i]["description"], 0, 50, "...") . " " . $bddoffres[$i]['period'] . " " . $bddoffres[$i]['from_date'] . " " . $bddoffres[$i]['to_date'] . " " . $bddoffres[$i]['categorie'] . " <b>SUPPRIMER</b>" . "<br>";
        } ?>
    </form>
</section>
<img src="/img/footer.png" alt="fouter" class="footer">
</body>
</html>
