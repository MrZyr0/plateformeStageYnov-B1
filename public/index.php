<?php
    session_start();
    $_SESSION["RacineServ"] = dirname( dirname(__FILE__) );
    require_once ($_SESSION["RacineServ"]. "/src/php/lienbdd.php");

    $url = "";

    if (isset($_GET['url']))
    {
        $url = explode('/', $_GET['url']);
    }


    if (empty($url) == true || $url[0] == "recrutement")    // Si liens vide ou /recrutement
    {
        if ($url[1] == "profil")             // Si /recrutement/profil
        {
            if (isset($url[2]))         // Si /recrutement/profil/idProfil
            {
                $idProfil = $url[2];
                if($url[3] == "contact")        // Si /recrutement/profil/idProfil/contact
                {
                    require_once($_SESSION[RacineServ] . "/pages/offre_traitement.php");
                }
                require_once($_SESSION["RacineServ"] . "/pages/profil.php");
            }
            else                                    // Si pas d'idProfil
            {
                require_once($_SESSION["RacineServ"] . "/pages/404.php");
            }
        }
        if (isset($url[1]) == false)            // Si autre que /recrutement/profil
        {
            require_once($_SESSION["RacineServ"] . "/pages/recrutement.php");
        }
    }
    else
    {
        require_once($_SESSION["RacineServ"] . "/pages/404.php");
    }
?>
