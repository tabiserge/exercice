<?php
session_start();

//Connexion a la base de donnée
include('../config/config.php');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
  $requser->execute(array($getid));
  $reqinfo = $requser->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mon profil</title>
</head>
<body>
	<div align="center">
		<h2>profil de <?php echo $reqinfo['pseudo']?></h2>
		<br><br>
		<h4>Pseudo = <?php echo $reqinfo['pseudo']?></h4>
		<h4>Mon email = <?php echo $reqinfo['email']?></h4>
		<?php 
		if(isset($_SESSION['id']) AND $reqinfo['id'] == $_SESSION['id'])
		{
		?>
		<a href="editerprofil.php">editer mon profil</a>
		<a href="deconnexion.php">se deconnecter</a>

        <?php
		}

		?>
		
	</div>

</body>
</html>
<?php
}
?>