<h2>Blog</h2>

<hr/>

<?php

$posts = get_posts();

foreach($posts as $post){
    ?>

    <div class="row">
        <div class=" col s12 m12 l12">
            <h4><?= $post->title ?></h4>
            <span><small> Le <?= date("d/m/Y à H:i", strtotime($post->date)) ?></small></span>
            <div class="row">
                <div class="col s12 m6 l4">
                    <img src="img/posts/<?= $post->image ?>" alt=" <?= $post->title ?>" class="materialboxed responsive-img"/>
                    <br/><br/>
                    <a href="index.php?page=post&id= <?= $post->id ?>" class="btn light-blue waves-effect ">Afficher l'article complet</a>
                </div>
                <div class="col s12 m6 l8">
                    <p class="flow-text"><?= substr(nl2br($post->content)."...",0,1200)?></p>
                </div>

            </div>
        </div>
    </div>

    <hr/>

    <?php

}