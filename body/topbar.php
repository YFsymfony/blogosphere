<nav class="light-blue">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="'brand-logo">BLOGOSPHERE</a>

            <a href="#" data-activates="mobile-menu" class="button-collapse">
                <i class="material-icons">list</i>
            </a>

            <ul class="right hide-on-med-and-down">

                <?php
                /*
                   class="<?php echo ($page=='home')?'active' : ''; ?>"

                                      veux dire

                   if $page = page courante alors class active, else rien
                    ($var == string)? ---> if
                                    : ---> else
                */
                ?>

                <li class="<?php echo ($page=='home')?'active' : ''; ?>" >
                    <a href="index.php?page=home">Accueil</a>
                </li>
                <li class="<?php echo ($page=='blog')?'active' : ''; ?>" >
                    <a href="index.php?page=blog">Blog</a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-menu">
                <li class="<?php echo ($page=='home')?'active' : ''; ?>" >
                    <a href="index.php?page=home">Accueil</a>
                </li>
                <li class="<?php echo ($page=='blog')?'active' : ''; ?>" >
                    <a href="index.php?page=blog">Blog</a>
                </li>
            </ul>
        </div>
    </div>
</nav>