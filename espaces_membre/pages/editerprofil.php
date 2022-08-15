<?php
session_start();
include('../config/config.php');

if(isset($_SESSION['id']))
{
	$req = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$req->execute(array($_SESSION['id']));
	$requser = $req->fetch();

	if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $requser['pseudo'])
	{
		$newpseudo = htmlspecialchars($_POST['newpseudo']);
		$reqpseudo = $bdd->prepare('UPDATE membres SET pseudo = ? WHERE id = ?');
		$reqpseudo->execute(array($newpseudo, $_SESSION['id']));
		header('location: profil.php?id='.$_SESSION['id']);
	}

	if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $requser['pseudo'])
	{
		$newemail = htmlspecialchars($_POST['newemail']);
		$reqemail = $bdd->prepare('UPDATE membres SET email = ? WHERE id = ?');
		$reqemail->execute(array($newemail, $_SESSION['id']));
		header('location: profil.php?id='.$_SESSION['id']);
	}
	if(isset($_POST['mdp1']) AND !empty($_POST['mdp1']) AND isset($_POST['mdp2']) AND !empty($_POST['mdp2']))
	{
		$mdp1 = sha1($_POST['mdp1']);
		$mdp2 = sha1($_POST['mdp2']);

		if($_POST['mdp1'] == $_POST['mdp2'])
		{
			$newmdp = $bdd->prepare('UPDATE membres SET pass = ? WHERE id = ?');
			$newmdp->execute(array($mdp1, $_SESSION['id']));
			header('location: profil.php?id='.$_SESSION['id']);
		}
		else
		{
		   $message = "Vos deux mots de passe ne correspondent pas!";
		}

	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Editer mon profil</title>
</head>
<body>
	<div align="center">
		<h2>Editer mon profil</h2>
		<form method="post" action="">
			<table>
				<tr align="right">
					<td>
						<label for="newpseudo">Pseudo:</label>
					</td>
					<td>
						<input type="text" name="newpseudo" id="newpseudo" value="<?php echo$requser['pseudo'];  ?>">
					</td>
					<tr align="right">
						<td>
							<label for="newemail">Email:</label>
						</td>
						<td>
							<input type="email" name="newemail" id="newemail" value="<?php echo $requser['email']; ?>" >
						</td>
					</tr>
					<tr align="right">
						<td>
							<label for="mdp1">Mot de passe</label>
					    </td>
					    <td>
					    	<input type="password" name="mdp1" id="mdp1">
					    </td>

					</tr>
					<tr align="right">
						<td>
							<label for="mdp2">Confirmation mot de passe</label>
					    </td>
					    <td>
					    	<input type="password" name="mdp2" id="mdp2">
					    </td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" value="Mettre à jour">
						</td>
					</tr>
					
				</tr>
				
			</table>
			
		</form>
		<?php
		if(isset($message))
		{
			echo "<font color='red'>".$message."</font>";
		}
		?>
	</div>

</body>
</html>
<?php
}
?>