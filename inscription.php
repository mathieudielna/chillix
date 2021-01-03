<?php 

session_start();

require_once "inc/connbdd.php";



if(isset($_POST['forminscription']))
{
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $email1 = htmlspecialchars($_POST['email1']);
        $mdp = sha1($_POST['mdp']);
        $mdp1 = sha1($_POST['mdp1']);
    if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email1']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp1']))
    {


        $pseudolength = strlen($pseudo);
        
        if($pseudolength <= 255)
        {
            if($email == $email1)
            {

                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $reqmail = $bdd->prepare("SELECT * FROM `user` WHERE `email`=? ");
                    $reqmail->execute(array($email));
                    $mailexiste = $reqmail->rowCount();
                    if($mailexiste == 0)
                    {
                        if($mdp == $mdp1)
                        {
                            $stmt = $bdd->prepare("INSERT INTO `user`(`pseudo`, `email`, `mdp`) VALUES(?,?,?)");
                            $stmt->execute(array($pseudo,$email,$mdp));
    
                            $_SESSION['comptecree'] = "Votre compte a biens été crée !";
                            header("location : index.php");
                        }
                        else
                        {
                            $erreur = "Vos mot de passe ne correspondents pas !";
                        }
                    }
                    else
                    {
                        $erreur = "Adresse mail deja utiliser !"; 
                    }
                }
                else
                {
                    $erreur ="Votre adresse mail n'est pas valide !";
                }
            }
            else
            {
                $erreur = "Vos adresses mail ne coreespondent pas !";
            }
        }
        else
        {
            $erreur = "Votre pseudo depasse 255 carracteres !";
        }


    }
    else
    {
        $erreur= "Tout les champs doivent etre completer !";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>INSCRIPTION CHILLIX</title>
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
    <h2>Inscription</h2>
    <legend><b>Formulaire d'inscription CHILLIX</b></legend>
        <form action="" method="post">
            <table>
            <tr>
                    <td align="right">
                        <label for="pseudo">Pseudo :</label>
                    </td>
                    
                    <td>
                        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required value="<?php if(isset($pseudo)) { echo $pseudo;} ?>">
                        
                    </td>
                </tr>  
                <tr>
                    <td align="right">
                        <labe fo="email">Em@il :</label>
                    </td>
                    <td>
                        <input type="email" id="email" name="email" placeholder="entre email" required value="<?php if(isset($email)) { echo $email;} ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="email1">Confirmer em@il :</label>
                    </td>
                    <td>
                        <input type="email" id="email1" name="email1" placeholder="confirmation email" required value="<?php if(isset($email1)) { echo $email1;} ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mdp">Mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" id="mdp" name="mdp" placeholder="mot de passe" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <labe for="mdp1">confirmer mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" id="mdp1" name="mdp1" placeholder="confirmer mot de passe" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    
                    <td>
                        <br />             
                        <button type="submit" name="forminscription">Je m'inscris</button>
                    </td>
                </tr>  
            </table>
       </form>
       
       <?php

       if(isset($erreur))
       {
           echo  $erreur;
       }
       ?>
    </fieldset>            
</div>

