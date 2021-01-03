
<?php
try
{
        $bdd = new PDO('mysql:host=localhost;dbname=dielnam;charset=utf8', 'dielnam', '#j7;tnwQTmrN');
        //$bdd = new PDO('mysql:host=localhost;dbname=bddfilm;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>