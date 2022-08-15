<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Commentaire</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h2>Mon super blog!</h2>
	<a href="blog.php">Retour à la liste des billets</a>
	<?php
     //connexion a la base de donnée
     include('config/config.php');

     //Recuperation de billet
     $req = $bdd->prepare('SELECT id,titre, contenu ,DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id=?');
     $req->execute(array($_GET['billet']));

     $donnee = $req->fetch();
     ?>
     <div class="news">
     	<h3><?php echo htmlspecialchars($donnee['titre'])?> 
     	<em>le<?php echo $donnee['date_creation_fr']?></em>
     	</h3>
     	<p>
     		<?php 
     		echo nl2br(htmlspecialchars($donnee['contenu'])); 
     		?>
     		
     	</p>
    </div> 	
    <h2>Commentaires</h2>
    <?php
    $req->closeCursor();

    //Recuperation du commentaire
    $req2 = $bdd->prepare('SELECT id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaire WHERE id_billet=?');
    $req2->execute(array($_GET['billet']));
    while ($donnee = $req2->fetch()) 
    {
    	?>
          <strong><?php echo htmlspecialchars($donnee['auteur']);?></strong> le <?php echo $donnee['date_commentaire_fr'];?>
          <p>
          	<?php echo nl2br(htmlspecialchars($donnee['commentaire'])) ;?>
          </p>
          <br />

    	<?php
    }
    $req2->closeCursor();
    ?>
  
    <h3> Poster vos commentaires</h3>
    <form method="post" action="commentaires_post.php">
     	
    	<p><label for="auteur">Auteur</label> </p>
    	<p><input type="text" name="auteur" id="auteur "></p>
     
    	<p><label for="commentaire">Vos Commentaires</label></p>
    	<p><textarea rows="4" cols="20"></textarea></p>

    	<p>Veuillez choisir le poste a commenter</p>

    	<input type="radio" name="id_billets" id="id_billet" value="1" checked="checked"><label for="id_billet">1</label>
    	<input type="radio" name="id_billets" id="id_billets" value="2"><label for="id_billets">2</label>

    	<p><input type="submit" value="Poster"></p>

    		
    </form>
</body>
</html>
 
