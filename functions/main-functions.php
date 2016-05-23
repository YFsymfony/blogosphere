<?php

    //**********************************************CONNECTION DATABASE*******************************************


    // variables utiles et facile à changer pour la mise en ligne futur du blog
    $dbhost = 'localhost';
    $dbname = 'blog';
    $dbuser = 'root';
    $dbpswd = '';

    // utilisation des exceptions car s'il y a une erreur , les mots de passe serons affichés en clair dans l'erreur php

    try{
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',PDO::ATTR_ERRMODE
        => PDO::ERRMODE_WARNING ));
    }catch(PDOexception $e){
        die("erreur de connexion à la base de données");
    }