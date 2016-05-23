<?php

    function get_posts(){

        /* Ici on va utiliser l'objet PDO, la variable $db présente dans main-functions.php n'est ps accessible ici, donc on
        la transforme en variable global */
        global $db;

        $request = $db->query("

            SELECT posts.id,
                   posts.title,
                   posts.image,
                   posts.date,
                   posts.content,
                   admins.name

            FROM posts
            JOIN admins
            ON posts.writer=admins.email
            WHERE posted='1'
            ORDER BY date DESC
            LIMIT 0,5

        ");

        // On a plusieurs résultats , donc on boucle pour fetch dans un tableau $results que l'on vien de déclarer vide avant la boucle
        // je défini une variable qui va contenir tous les résultas de la requete et la mettre dans un tableau
        $results = array();    // ou alors $results = [] , ca marche aussi

        // on parcours les résultats et on les integrent à la variable tableau $results
        while($rows = $request->fetchObject() ){
            $results[] = $rows;
        }

        //on retourne $results pour l'afficher à l'utilisateur
        return $results;



    }