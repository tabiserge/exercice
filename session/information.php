<?php
session_start();
setcookie('ville','chine',time() + 7*24*3600,null,null,false,true);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
    <p>Re-bonjour !</p>
    <p>
        je me souviens de toi! tu t'appelles <?php echo $_SESSION['nom'].' '.$_SESSION['prenom']; ?><br/> et ton age hummm.. tu as <?php echo $_SESSION['age']; ?> ans, c'est ca? Et pour <?php echo $_COOKIE['ville'] ;?>
    </p>
    </body>
</html>