
<?php

    $post = get_single_post();

    // condition pour rediriger vers la page d'erreur si un id de post inexistant est renseigné dans l'url
    if($post == false){
        header("Location:index.php?page=error");
    }else{

        ?>
            <!-- cette fermeture de div ferme la div container globale ( index.php ligne 79 )pour placer la div de l'image en parralaxe-->
            </div>

                <div class="parallax-container">
                    <div class="parallax">
                        <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>"/>
                    </div>
                </div>

            <!-- cette ouverture de div permet d'ouvrir la div container global fermée à la ligne 13-->
            <div class="container">

                <h2> <?= $post->title ?></h2>
                <h6>Par <?= $post->name ?> le <?= date("d/m/Y à H:i", strtotime($post->date)) ?> </h6>

                <!-- attention au ; apres nl2br , sinon pas d'affichage et pas d'erreur php non plus ! -->
                <p> <?= nl2br($post->content); ?> </p>


    <?php
    }
    ?>

    <hr/>
         <h4>Commenter:</h4>

                <?php

                    if(isset($_POST['submit'])){
                        $name = htmlspecialchars(trim($_POST['name']));
                        $email = htmlspecialchars(trim($_POST['email']));
                        $comment = htmlspecialchars(trim($_POST['comment']));

                        // on va stocker les messages d'erreurs dans un tableau, on le déclare vide en premier lieu
                        $errors=[];

                        if(empty($name) || empty($email) || empty($comment) ){
                            $errors['empty'] = "tous les champs n'ont pas été remplis";
                        }else{
                            // FILTER_VALIDATE_EMAIL natif à php , à bosser: veux dire si l'email est différent du filtre de validation email alors display un message d'erreur
                            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                $errors['email']= "L'adresse dois etre une adresse email valide.";
                            }
                        }
                        if(!empty($errors)){
                            ?>

                                <div class="card red">
                                    <div class="card-content white-text">
                                        <?php
                                            // on boucle pour parcourir le tableau des erreurs pour toutes les afficher
                                            foreach($errors as $error){
                                                echo $error."<br/>";
                                            }
                                        ?>
                                    </div>
                                </div>

                            <?php
                        }else{

                            comment($name,$email,$comment);

                            //redirection via header ne marche pas car on a déja du contenu , on va donc utiliser un script js ( ne pas utiliser ceci si la redirection est vitale
                            //au fonctionnement du site.

                            ?> <!-- fermer la balise php pour inserer le script sinon erreur ! -->
                            <!--script>
                                window.location.replace("index.php?page=post&id= <?= $_GET['id'] ?>");
                            </script-->
                            <?php

                        }
                    }

                ?>

                <form action="" method="post">
                    <div class="row">
                        <div class="input-field col s12 m6 ">
                            <input type="text" name="name" id="name"/>
                            <label for="name">Nom</label>
                        </div>
                        <div class="input-field col s12 m6 ">
                            <input type="email" name="email" id="email"/>
                            <label for="email">adresse email</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
                            <label for="comment">Commentaire</label>
                        </div>
                        <div class="col s12">
                            <button type="submit" name="submit" class="btn waves-effect">Envoyer le commentaire</button>
                        </div>
                    </div>
                </form>