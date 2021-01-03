<?php
session_start();
?>
<div id="fondmenu">
        <u1 class="col-md-12" id="menu">
            <li><a href="home.php">menu</a></li>
            <li><a href="affichage.php">consulter</a></li>
            <li><a href="recherche.php">recherche</a></li>
            <?php
            if(isset($_SESSION['id'])){
            echo '<li><a href="inscription.php">créer un compte</a></li>';
            echo '<li><a href="#">ajouter</a></li>';
            echo '<li><a href="#">modifier</a></li>';
            echo '<li><a href="deco.php">deconnexion</a></li>';
            }
            ?>
        </u1>
    </div>

