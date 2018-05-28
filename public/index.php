<?php
    session_start();
    $_SESSION["RacineServ"] = dirname( dirname(__FILE__) );

    $url = "";

    if (isset($_GET['url']))
    {
        $url = explode('/', $_GET['url']);
    }


    if (empty($url) == true || $url[0] == "recrutement")
    {
        if (isset($url[1]))
        {
            $idProfil = $url[2];
            require_once($_SESSION["RacineServ"] . "/pages/profils.php");
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
