<?php
try
{
		$bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}		

?>
<?php 

$email=$_POST['email'];
$password=$_POST['password'];
$objectif=$_POST['test'];

?>


Bonjour, <?php echo htmlspecialchars($_POST['email']); ?>.
Ton mdp est <?php echo htmlspecialchars($_POST['password']); ?>.
Ton 1er objectif est <?php echo htmlspecialchars($_POST['test']); ?>

<?php $bdd->exec("INSERT INTO illdo(email, password, objectif) VALUES('$email', '$password', '$objectif')");

echo 'Le jeu a bien ete ajoute !';
?>