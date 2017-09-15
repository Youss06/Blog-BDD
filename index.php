<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Mon Blog</title>
  </head>
  <body>
<h1>Mon super Blog !</h1>
<p>Derniers billets du blog :</p>

<?php

try {
  $bdd = new PDO('mysql:host=localhost;dbname=Blog;charset=utf8', 'root', 'root');
} catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}


// $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');


$req = $bdd->query('SELECT * FROM billets');

while ($donnees = $req->fetch())
{

  ?>
  <div class="card container">
    <h1> <?php echo $donnees['titre'] ?></h1>
    <p><?php echo $donnees['contenu'] ?></p>
  </div>
  <?php
}

$req->closeCursor();

 ?>





  </body>
</html>
