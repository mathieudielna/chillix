<?php
session_start();



?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset = "utf-8">
  <title>Barre de recherche</title>
 </head>
  
 
 <!-- lien vers CSS -->

   <link rel="stylesheet" href="CSS/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">

 <body>
    <div id="fondmenu">
        <u1 class="col-md-12" id="menu">
            <li><a href="home.php" >menu</a></li>
            <li><a href="affichage.php">consulter</a></li>
            <li><a href="#">ajouter</a></li>
            <li><a href="formRecherche.php">recherche</a></li>
        </u1>
    </div>
<fieldset>
    <legend><b> Rechercher un film </b></legend>
    <center><form action ="recherche.php" method ="GET">
   <input type = "search" name = "film" id="film" placeholder="inserer titre" required> 
   <input type = "submit" name = "submit" value = "Rechercher"></center>
  </form>
</fieldset>

 </body>
</html>