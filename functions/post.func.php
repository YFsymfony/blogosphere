
<?php

function get_single_post(){

    /* Ici on va utiliser l'objet PDO, la variable $db présente dans main-functions.php n'est ps accessible ici, donc on
       la transforme en variable global. lorsque vous définissez une fonction, la portée d'une variable définie dans cette fonction est locale à la fonction
       Toute variable utilisée dans une fonction est donc par définition, locale. */

    // http://php.net/manual/fr/language.variables.scope.php
    global $db;

    $request = $db->query("

        SELECT posts.id,
               posts.title,
               posts.image,
               posts.content,
               posts.date,
               admins.name

        FROM posts
        JOIN admins
        ON posts.writer = admins.email
        WHERE posts.id='{$_GET['id']}'
    ");

    // on obtiendra un seul résultat donc :
    $result = $request->fetchObject();

    return $result;

}

function comment($name,$email,$comment){

    global $db;

    // test des différentes manières d'éxécuter la requete pour enregistrer le commentaire dans la base de données.


    //---------------------------------------------------------------------------------------------------------------------------------------

    //checker pourquoi ca marche pas , surement erreur de typo !!!!

    /*
    $c = array(
        'name'    => $name,
        'email'   => $email,
        'comment' => $comment,
        'post_id' => $_GET["id"]
    );
    */

    /*
    $sql = " INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";
    $request = $db->prepare($sql);
    $request->execute($c);
    */

    //--------------------------------------------------------------------------------------------------------------------------------------

    //checker pourquoi ca marche pas , surement erreur de typo !!!!

    /*
    $req = $db->prepare(" INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())");
    $req->execute($c);
    */


    //---------------------------------------------------------------------------------------------------------------------------------------

    $req = $db->prepare('INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())');
    $req->execute(array(
        'name'    => $name,
        'email'   => $email,
        'comment' => $comment,
        'post_id' => $_GET["id"]

    ));

    echo 'commentaire ajouté';


}