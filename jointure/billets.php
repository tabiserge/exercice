<!DOCTYPE html>
<html>
<head>
	<title>Jointure</title>
</head>
<body>
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

   ?>
   <h2>Mon super blog!</h2><br>
   <!--formulaire de billet-->
   <form method="post" action="commentaires.php">
   	<p><label for="titre">Titre :</label></p>
   	<p><input type="text" name="titre" id="titre" /></p>
   	<p><label for="contenu">Contenu</label></p>
   	<p><textarea rows="10" cols="40" id="contenu" name="contenu"></textarea></p>

   	<p><input type="submit" value="Envoyer"></p>
   	
   </form>
   <!--fin-->
   <hr>
   <?php
     $reponse = $bdd->query('SELECT id,titre,contenu FROM billets');
   
     while($donnee=$reponse->fetch())
     {
       ?>
       <table>
       	<tr>
       		<th>Titre:</th>
       		<td><?php echo htmlspecialchars($donnee['titre']); ?></td>

       	</tr>
       	<tr>
       		<th>Contenu:</th>
         	<td><?php echo htmlspecialchars($donnee['contenu']); ?></td>	
       	</tr>
       </table>
       <p>
       	<a href="page_commentaires.php?billet=<?php echo $donnee['id']; ?>">Commentaires</a>
       </p>

       <?php
     }
     $reponse->closeCursor();
   ?>

</body>
</html>