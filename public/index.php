<?php
    session_start();
    $_SESSION["RacineServ"] = dirname( dirname(__FILE__) );
    require_once ($_SESSION["RacineServ"]. "/src/php/lienbdd.php");

    $url = "";

    if (isset($_GET['url']))
    {
        $url = explode('/', $_GET['url']);
    }


    if (empty($url) == true || $url[0] == "recrutement")
    {
        if (isset($url[1]))
        {
            if (isset($url[2]))
            {
                $idProfil = $url[2];
                if($url[3] == "contact")
                {
                    require_once($_SESSION[RacineServ] . "/pages/offre_traitement.php");
                }
                require_once($_SESSION["RacineServ"] . "/pages/profils.php");
            }
            else
            {
                require_once($_SESSION["RacineServ"] . "/pages/404.php");
            }
        }
        if (isset($url[1]) == false)
        {
            require_once($_SESSION["RacineServ"] . "/pages/recrutement.php");
        }
    }
    else
    {
        require_once($_SESSION["RacineServ"] . "/pages/404.php");
    }
?>
