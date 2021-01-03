<?php
session_start();

//CONNECT
require_once "inc/connbdd.php";


if(isset($_POST['formconnexion']))
{
	$mailconnect = htmlspecialchars($_POST['mailconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);

	if(!empty($mailconnect) AND !empty($mdpconnect))
	{
		$requser = $bdd->prepare("SELECT * FROM `user` WHERE `email`=? AND `mdp`=?");
		$requser->execute(array($mailconnect,$mdpconnect));
		
		$userexist = $requser->rowCount();

		if($userexist == 1)
		{
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['email'] = $userinfo['email'];
            //header("location: home.php?id=".$_SESSION['id']);
            header("location: home.php");
		
		}
		else
		{
			$erreur = "Em@il ou mot de passe incorrect";
		}

	}
	else
	{
		$erreur = "Tout les champs doivent etre completer !";
	}
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CONNEXION CHILLIX</title>
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

  
<div align="center">
    <fieldset>
    <h2>CHILLIX</h2>
    <legend><b>CONNEXION</b></legend>
        <form action="" method="POST">
            <table>
                  <tr>
                    <td align="right">
                        <labe for="email">Em@il :</label>
                    </td>
                    <td>
                        <input type="email" id="mailconnect" name="mailconnect" placeholder="Email" required value="<?php if(isset($mailconnect)) { echo $mailconnect;} ?>">
                    </td>
                </tr>
				<tr>
                    <td align="right">
                        <label for="mdp">Mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" id="mdpconnect" name="mdpconnect" placeholder="mot de passe"requiered>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td></td>
                    
                    <td>
                        <br />             
                        <button type="submit" name="formconnexion">Connexion</button>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <br>
                        <a href="inscription.php">S'inscrire</a>
                    </td>
                </tr>  
            </table>
       </form>
	   <p align="center"><?php if(isset($erreur)){ echo  $erreur; } ?></p>
       

    </fieldset>            
</div>