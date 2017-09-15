<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Mon Blog !</title>
  </head>
  <body>

<?php

try {
  $bdd = new PDO('mysql:host=localhost;dbname=Blog;charset=utf8', 'root', 'root');
} catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}

$get_id = $_GET['identifiant'];

$req = $bdd->prepare('SELECT * FROM billets WHERE id=?');
$req->execute([$get_id]);


?>
<h1>Mon Blog !</h1>
<a href="index.php">Retour à la liste des billets</a>

<?php

$billets = $req->fetch();
{
  ?>
  <div class="news">
    <h3> <?php echo $billets['titre'] ?> <?php echo $billets['date_creation'] ?></h3>
    <p><?php echo $billets['contenu'] ?></p>
  </div>
  <?php
}

$reponse = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet=?');
$reponse->execute([$get_id]);

while ($commentaires = $reponse->fetch())
{
?>

<p><?php echo $commentaires['auteur'] ?></p>
<p><?php echo $commentaires['commentaires'] ?></p>
<p><?php echo $commentaires['date_commentaire'] ?></p>

<?php
}

$reponse->closeCursor();

 ?>
  </body>
</html>
