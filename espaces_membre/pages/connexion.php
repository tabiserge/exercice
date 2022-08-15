<?php
session_start();

//Connexion a la base de donnée
include('../config/config.php');
if(isset($_POST['formconnexion']))
{
	$email = htmlspecialchars($_POST['email']);
	$mdp = sha1($_POST['mdp']);
	if(!empty($email) AND !empty($mdp))
	{
      $requser = $bdd->prepare('SELECT * FROM membres WHERE email = ? AND pass= ?');
      $requser->execute(array($email, $mdp));
      $reqexist = $requser->rowCount();
      if($reqexist == 1)
      {
        $reqinfo = $requser->fetch();
        $_SESSION['id'] = $reqinfo['id'];
        $_SESSION['pseudo'] = $reqinfo['pseudo'];
        $_SESSION['email'] = $reqinfo['email'];
        header('location:profil.php?id='.$_SESSION['id']);
      }
      else
      {
      	$message = "Mauvais email ou mot de passe <a href=\"inscription.php\">S'inscrire</a>";
      }
	}
	else
	{
		$message = "Remplisent les champs";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
</head>
<body>
	
	<div align="center">
		<h2>Connexion</h2>

		<form method="post" action="">
			<table>
				<tr>
					<td><label for="email">Adresse e-mail:</label></td>
					<td><input type="email" name="email" id="email"></td>
				</tr>
				<tr>
					<td><label for="mdp">Mot de passe:</label></td>
					<td><input type="password" name="mdp" id="mdp"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<br><input type="submit" name="formconnexion" value="se connecter">
					</td>
				</tr>
			</table>
			
		</form>
		<?php 
		if(isset($message))
		{
			echo '<font color="red">'.$message.'</font>';
		}
		?>
		
	</div>
</body>
</html>