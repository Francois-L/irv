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
session_start();



$bdd->exec("INSERT INTO illdo(objectif) VALUES('.$dynamicValue1-['i'].')");


?>

Ton objectif est <?php echo htmlspecialchars($_POST['.$dynamicValue1-["i"].']); ?>

 <?php
     
       echo $_GET['var_PHP_data'];
    
?>

 <?php                                                     
   exit(0);
   mysql_close();
?>


<!-- Ici ça va pas du tout, mais ça dépendra de ce que je peux faire avec l'ajax :) -->
