<?php
session_start();

// CONNECTION BDD

require_once "inc/connbdd.php";

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
 <?php
            include_once("inc/menu.php");
?>
<fieldset>
    <legend><b> Rechercher un film </b></legend>
    <center><form action ="recherche.php" method ="GET">
   <input type = "search" name = "film" id="film" placeholder="inserer titre" required>
   <input type = "submit" name = "submit" value = "Rechercher"></center>
  </form>
</fieldset>

 </body>
</html>


<?php


//RECUP DE DONNEE

$recherche = $_GET["film"];

//SHARE

$sql="SELECT * FROM `TABLE 1` WHERE `titre` LIKE '%$recherche%' ORDER BY `titre`";

$share = $bdd->query($sql);

$nbresult = $share->rowCount();

echo "Nombre de resultats trouvé :".$nbresult;

//SHOW

echo "<table border='2' >" ;
echo '<tr>';
echo '<td style="background-color: yellow">'.'<strong>'.'Titre'.'</strong>'.'</td>';
echo '<td style="background-color: orange">'.'Réalisateur'.'</td>';
echo '<td style="background-color: white">'.'Année + Pays'.'</td>';
echo '<td style="background-color: rgb(131, 23, 23)" >'.'Production'.'</td>';
echo '<td style="background-color: rgb(10, 105, 105)">'.'Genre'.'</td>';
echo '<td style="background-color: rgb(94, 10, 105)">'.'Acteurs'.'</td>';
echo '<td style="background-color: green">'.'Commentaire'.'</td>';
echo '</tr>';
while ($like = $share->fetch())
{
    echo '<tr>'.'<td style="background-color: yellow">' . '<b>'. $like['titre'] . '</td>'
    .'<td style="background-color: orange">' . $like['realisateur']. '</td>'
    .'<td style="background-color: white">' . $like['annee_pays'] . '</td>'
    .'<td style="background-color: rgb(131, 23, 23)">' . $like['producteur']. $like['type'] . '</td>'
    .'<td style="background-color: rgb(10, 105, 105)">'  . $like['COL 5'] . '</td>'
    .'<td style="background-color: rgb(94, 10, 105)">'. $like['acteurs']. $like['actrices'] . '</td>'
    .'<td style="background-color: green">' . $like['note']  .'</td>' .'</tr>';
}
echo '</table>';

?>
