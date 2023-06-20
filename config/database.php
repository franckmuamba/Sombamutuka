<?php
//gestion d'erreur avec try catch
try
{
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'sombamutukadb');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');

    $bd= new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);

    // Eveil des notifications lors d'erreurs des traitements
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e)
{
    die('Erreur : '.$e->getMessage());
}
