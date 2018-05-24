<?php

class SQL
{
    private $PDO = null;

    function __construct(string $DB, string $user, string $pass)                    // Créer un objet SQL suivant les paramètres donnés
    {
        $dsn = 'mysql:dbname=' . $DB . ';host=localhost';
        $user = $user;
        $password = $pass;

        try
        {
            $this->PDO = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            $this->PDO->exec("SET CHARACTER SET utf8");
        }
        catch (PDOException  $e)                                                    // En cas d'erreur faire....
        {
            print "constructor error";
        }

    }

    function queryGetData(string $sql)                                              // Renvoi le résultat d'un requette
    {
        try
        {
            $Statement = $this->PDO->prepare($sql);

            $Statement->execute();

            return $Statement->fetchAll();
        }
        catch (PDOException  $e)                                                    // En cas d'erreur faire....
        {
            print "queryGetData error";
        }

    }

    function queryCreateData(string $sql)                                           // Créer le contenu de la requette
    {
        try
        {
            $Statement = $this->PDO->prepare($sql);

            return $Statement->execute();
        }
        catch (PDOException  $e)                                                    // En cas d'erreur faire....
        {
            print "queryCreateData error";
        }

    }

}

?>
