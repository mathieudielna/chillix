<?php
session_start();

//require_once "inc/connbdd.php";
// if(isset($_GET['id']) AND $_GET['id'] > 0)
// {
//     $getid = intval($_GET['id']);

//     $requser = $bdd->prepare("SELECT * FROM `user` WHERE `id`=?");
//     $requser->execute(array($getid));
//     $userinfo = $requser->fetch();
//     var_dump($userinfo);
// 

if(isset($_SESSION['id']) AND $_SESSION['id']> 0){

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Chillix html</title>
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
      <p><span style="border: 5px solid white;">CHILLIX</span></p>
      <p>Pseudo :<?= $_SESSION['pseudo'] ?></p>
    
    </div>


</body>
</html>

<?php
}
else

{
    header("location: index.php");
}
?>