<?php
//connexion a la base de donnée
include('../config/config.php');

//Verification des variable du formulaire
if(isset($_POST['forminscription']))
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['email2']);
    $mdn1 = sha1($_POST['mdn1']);
    $mdn2 = sha1($_POST['mdn2']);

	if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdn1']) AND !empty($_POST['mdn2']))
	{   
		$pseudolength = strlen($pseudo);
    	if ($pseudolength <= 255) 
    	{

    		if($email == $email2)
    		{
    			if(filter_var($email, FILTER_VALIDATE_EMAIL))
    			{
		            $reqemail = $bdd->prepare('SELECT * FROM membres WHERE email =?');
		    		$reqemail->execute(array($email));
		    		$emailexist = $reqemail->rowCount();
		    		if($emailexist == 0)
		    		{
			    	  if($_POST['mdn1'] == $_POST['mdn2'])
			    		{
	                    $reqinsert = $bdd->prepare('INSERT INTO membres(pseudo, email, pass, date_inscription) VALUES(?, ?, ?, CURDATE())');
	                    $reqinsert->execute(array($pseudo, $email, $mdn1));
	                    $message="Bravo, vous etes membres!";
	                       
			    		}
			    		else
			    		{
			    			$message = 'Vos mot de passe ne correspondent pas!';

			    		}
                    }
                    else
                    {
                       $message = "Votre mail exite déjà";
                    }

                }
                else
                {
                	$message = 'Votre adresse n\' pas pas valide!';
                }
    		}
    		else
    		{
    			$message = "Vos adresse mail ne correspondent pas!";
    		}
    	}
    	else
    	{
           $message = 'Votre pseudo depasse les 255 caratère';
    	}
	}
	else
	{
		$message = 'Tous les champs ne sont pas remplie!';
	}
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="main" align="center">
		<h2>Inscription</h2>
		<form method="post" action="">
			<table>
				<tr align="right">
					<td>
						<label for="pseudo">Pseudo:</label>
					</td>
					<td>
						<input type="text" name="pseudo" id="pseudo">
					</td>
				</tr>
				<tr align="right">
					<td>
						<label for="email">Adresse email:</label>
					</td>
					<td>
						<input type="email" name="email" id="email">
					</td>
				</tr>
				<tr align="right">
					<td>
						<label for="email2">Adresse email de confimation:</label>
					</td>
					<td>
						<input type="email" name="email2" id="email2">
					</td>
				</tr>
				<tr align="right">
					<td>
						<label for="mdn1">Mot de passe:</label>
					</td>
					<td>
						<input type="password" name="mdn1" id="mdn1">
					</td>
				</tr>
				<tr align="right">
					<td>
						<label for="mdn2">Confimation du mot de passe:</label>
					</td>
					<td>
						<input type="password" name="mdn2" id="mdn2">
					</td>
				</tr>

				<tr>

					<td></td>
					<td>
						<br>
						<input type="submit" name="forminscription" value="je m'inscris">
					</td>
				</tr>
			</table>
			
	</form>
	<?php 
	if(isset($message)) 
	{
		echo "<font color='red'>".$message."</font>";
	}
	?>
	<p><a href="connexion.php">se connecter</a></p>
	</div>

</body>
</html>