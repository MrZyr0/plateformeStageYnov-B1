<?php

class SQL
{
    private $PDO = null;

    function __construct(string $DB, string $user, string $pass)
    {
        $dsn = 'mysql:dbname=' . $DB . ';host=localhost';
        $user = $user;
        $password = $pass;

        try
        {
            $this->PDO = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        catch (PDOException  $e)
        {
            header("Location: /Projet-PHP/src/php/firstLaunch.php?errorDB");
        }

    }

    function queryGetData(string $sql)
    {
        try
        {
            $Statement = $this->PDO->prepare($sql);

            $Statement->execute();

            return $Statement->fetchAll();
        }
        catch (PDOException  $e)
        {
            header("Location: /Projet-PHP/src/php/firstLaunch.php?errorDB");
        }

    }

    function queryCreateData(string $sql)
    {
        try
        {
            $Statement = $this->PDO->prepare($sql);

            return $Statement->execute();
        }
        catch (PDOException  $e)
        {
            header("Location: /Projet-PHP/src/php/firstLaunch.php?errorDB");
        }
        
    }

}

?>
