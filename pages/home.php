<h1>Page d'accueil</h1>

<hr>

<div class="row">
<?php

    // on stock les résultat de la fonction get_posts() dans $posts
    $posts = get_posts();

    foreach($posts as $post){
        ?>
            <div class="col l6 m6 s12">
                <div class="card">
                    <div class="card-content">
                        <h5 class="grey-text text-darken-2">
                            <!-- la ligne en dessous équivaut à echo $post->title -->
                            <?= $post->title ?>
                        </h5>
                        <h6 class="grey-text ">
                            Le <?= date("d/m/Y à H:i",strtotime($post->date)); ?> par <?= $post->name ?>
                        </h6>
                    </div>
                    <div class="card-image waves-effect waves-block ">
                        <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>" class="activator"/>
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
                        <p><a href="index.php?page=post&id= <?= $post->id ?> ">Lire l'article entier</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-3">
                            <?= $post->title ?> <i class="material-icons right">close</i>

                        </span>
                        <p><?= substr(nl2br($post->content),0,1000);?> ... </p>
                    </div>
                </div>
            </div>
        <?php
    }

?>
</div>