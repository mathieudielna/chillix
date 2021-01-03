<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>affichage film</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

</head>
   <!-- lien vers CSS -->

   <link rel="stylesheet" href="CSS/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">

    <!-- //lien vers CSS -->
<body>
<?php
            include_once("inc/menu.php");
?>
    <div class="banner-text">
    </div>


</body>
</html>

<?php 

//CONNECT

require_once "inc/connbdd.php";




//REQUETE SQL
$affichage = $bdd->query('SELECT * FROM `TABLE 1`');

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

//AFFICHAGE LIGNE PAR LIGNE
while ($donnees = $affichage->fetch())
{
    echo '<tr>'.'<td style="background-color: yellow">' . '<b>'. $donnees['titre'] . '</td>'
    .'<td style="background-color: orange">' . $donnees['realisateur']. '</td>'
    .'<td style="background-color: white">' . $donnees['annee_pays'] . '</td>'
    .'<td style="background-color: rgb(131, 23, 23)">' . $donnees['producteur']. $donnees['type'] . '</td>'
    .'<td style="background-color: rgb(10, 105, 105)">'  . $donnees['COL 5'] . '</td>'
    .'<td style="background-color: rgb(94, 10, 105)">'. $donnees['acteurs']. $donnees['actrices'] . '</td>'
    .'<td style="background-color: green">' . $donnees['note']  .'</td>' .'</tr>';
}
echo '</table>'

?>

