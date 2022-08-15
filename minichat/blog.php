<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Super blog</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h2>Mon super blog!</h2>
	<p>Dernier billet de blog</p>
	<?php
	//connexion a la base de donnée
     include('config/config.php');
     //Recuperation du billet
     $reponse = $bdd->query('SELECT id,titre,contenu,DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets');
     while($donnee = $reponse->fetch())
     {
     	?>
     <div class="news">
     	<h3><?php echo htmlspecialchars($donnee['titre'])?> 
     	<em>le<?php echo $donnee['date_creation_fr']?></em>
     	</h3>
     	<p>
     		<?php 
     		echo nl2br(htmlspecialchars($donnee['contenu'])); 
     		?>
     		<br />
     		<em><a href="page_commentaires.php?billet=<?php echo $donnee['id']; ?>">Commentaires</a></em>
     	</p>
    </div> 	

     <?php
     }
     $reponse->closeCursor();
	?>

</body>
</html>