<!-- Connection a la bdd-->
 <?php
$host = 'localhost';
$user = 'root';
$mot_de_passe = '';
$bdd = 'onlybook8';

$connexion = mysqli_connect($host, $user, $mot_de_passe, $bdd);


if (!$connexion) {
  die('Erreur lors de la connexion a la base de donne' . mysqli_connect_error());
}
?>
