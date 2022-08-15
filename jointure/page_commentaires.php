<!DOCTYPE html>
<html>
<head>
	<title>page commentaire</title>
</head>
<body>
	<h2>Mon super blog</h2>
	<p><a href="billets">Retour</a></p>
	<?php
   //connexion a la base de donnée
      try
        {
          $bdd = new PDO('mysql:hote=localhost;dbname=blog;charset=utf8','root','');
        }
        catch(Expection $e)
        {
          die('Erreur :'.$e->getMessage());
        }

//Recuperation du billet 
$req =$bdd ->prepare('SELECT id,titre,contenu FROM billets WHERE id=:id');
$req->execute(array(
	'id'=>$_GET['billet']
));
$donnee = $req->fetch()
?>
 
  <table>
  	<tr>
  		<th>Titre:</th>
  		<td><?php echo htmlspecialchars($donnee['titre']); ?><td>
  	</tr>
  	<tr>
       		<th>Contenu:</th>
         	<td><?php echo htmlspecialchars($donnee['contenu']); ?></td>	
    </tr>
  </table>
<?php  
$req->closeCursor();
//fin    
?>
<h2>Commentaires</h2>
<?php
//Recuperation des commentaires
$req2 = $bdd->prepare('SELECT id_billet, auteur, commentaire FROM commentaire WHERE id_billet=?');
    $req2->execute(array($_GET['billet']));
    while ($donnee = $req2->fetch()) 
    {
    	?>
          <strong><?php echo htmlspecialchars($donnee['auteur']);?></strong>
          <p>
          	<?php echo nl2br(htmlspecialchars($donnee['commentaire'])) ;?>
          </p>
          <br />


      <?php
    }
    $req2->closeCursor();
    //fin
    ?>

   <!--formulaire de billet-->
   <form method="post" action="commentaire_post.php">

   	<p><label for="auteur">Auteur :</label></p>
   	<p><input type="text" name="auteur" id="auteur" /></p>

   	<p><label for="commentaires">Commentaires</label></p>
   	<p><textarea rows="10" cols="40" id="commentaires" name="commentaires"></textarea></p>

   	<p><input type="submit" value="poster"></p>
   	
   </form>
   <!--fin-->
   
</body>
</html>