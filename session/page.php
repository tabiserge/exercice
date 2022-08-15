
<?php
//appel a la fonction session start avant tous
session_start();

$_SESSION['nom'] = 'jean';
$_SESSION['prenom'] = 'dupont';
$_SESSION['age'] = 18;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Utilisation de session</title>
</head>
<body>
	<p>
        Salut <?php echo $_SESSION['prenom']; ?> !<br />
        Tu es à l'accueil de mon site (page.php). Tu veux aller sur une autre page ?
    </p>
    <p>
        <a href="monscript.php">Lien vers monscript.php</a><br />
        <a href="information.php">Lien vers informations.php</a>
    </p>
      
</body>
</html>