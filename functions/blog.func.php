<?php

    function get_posts(){

        /* Ici on va utiliser l'objet PDO, la variable $db présente dans main-functions.php n'est ps accessible ici, donc on
           la transforme en variable global */
        global $db;

        $request = $db->query(" SELECT * FROM posts WHERE posted='1' ORDER BY date DESC");

        // On a plusieurs résultats , donc on boucle pour fetch dans un tableau $results que l'on vien de déclarer vide avant la boucle
        $results = [];

        // on parcours les résultats et on les intègrent à la variable tableau $results
        while($rows = $request->fetchObject()){
            // ne pas oublier les crochets pour préciser que l'on modifie le tableau et non la variable elle meme
            $results[] = $rows;
        }

        return $results;

    }
