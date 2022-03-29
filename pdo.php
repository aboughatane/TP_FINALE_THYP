<?php
/* Connecter la base de données */
        try
        {
            $mysqlClient = new PDO('mysql:host=localhost;dbname=my_database;charset=utf8', 'root', 'root');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
?>