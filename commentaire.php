<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Commentaires</title>
  </head>
  <body>
    <h1>Commentaires</h1>
<a href="index.php">Retour à la liste des billets</a>

<?php

try {
  $bdd = new PDO('mysql:host=localhost;dbname=Blog;charset=utf8', 'root', 'root');
} catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}

$req = $bdd->query('SELECT * FROM billets');


while ($donnees = $req->fetch())
{

echo $donnees['titre'];
echo $donnees['contenu'];
}
 ?>
  </body>
</html>
