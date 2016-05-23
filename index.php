
<?php

    //****************************************************MAIN FUNCTION**********************************************************************

    // fonction de connection a la database
    include 'functions/main-functions.php';

    //****************************************************URL MANAGEMENT*********************************************************************

    /*
       ICI gestion des url , je veux une url de type : blogosphere/index.php?page=home ou blogosphere/index.php?page=blog
       Les pages sont un un dossier pages et serront appelées dans l'index via des include
       La variable $page en url correspond au nom d'une page à inclure dans l'index ( je veux que tous passe par l'index
       Si la page est vide , redirection automatique vers la page home
       Si une erreur est présente dans l'url , je redirige vers la page error )
    */

    // l'oublie du slash après le nom de dossier dans scandir() entraine une erreur
    $pages = scandir('pages/');

    if(isset($_GET['page']) && !empty($_GET['page'])){
        // appel de 'page' via url get , concatener avec l'extention sinon le fichier n'est pas trouvé
        if(in_array($_GET['page'].'.php',$pages)){
            $page = $_GET['page'];
        }else{
            // affiche la page error si une page demander via url n'existe pas
            $page = 'error';
        }
    }else{
        // si l'utilisateur ne renseigne pas de page , la redirection est la page home par défaut
        $page = "home";
    }


    //*******************************************************FUNCTION MANAGEMENT**************************************************************

    /* ICI gestion des appel des fonctions utilisées par les pages appelées
       On part chercher les fonctions avec scandir() et si il n'y a pas de fonction associée à la page , on ne fait rien

       /!\ ATTENTION /!\ certaines fonction sont générale et sont présente sur toute les pages ( main-function.php ) déja traité en haut du code
    */

    // l'oublie du slash après le nom de dossier dans scandir() entraine une erreur
    $pages_functions = scandir('functions/');


    if(in_array($page.'.func.php',$pages_functions)){
        include 'functions/'.$page.'.func.php';
    }


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type"      content="text/html; charset=utf-8" />
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    </head>

    <body>

        <?php
            // inclusion du menu présent sur toute les pages
            include "body/topbar.php";
        ?>

        <div class="container">
            <?php
                // inclusion du contenu en fonction de l'url $page = $_GET['page']
                include 'pages/'.$page.'.php';
            ?>

        </div>

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/script.js"> </script>

        <?php

            //
            $pages_js = scandir('js/');

            if(in_array($page.'.func.js',$pages_js)){
                ?>
                    <script type="text/javascript" src="js/<?= $page ?>.func.js"> </script>
                <?php
            }

        ?>

    </body>
</html>