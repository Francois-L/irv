<?php require_once 'db.php';

$sendObjectif = !empty($_POST['sendObjectif']) ? $_POST['sendObjectif'] : NULL;

$sendDate = !empty($_POST['sendDate']) ? $_POST['sendDate'] : NULL;


 //Ton traitement de tri
if(!empty($_POST['sendObjectif']) and !empty($_POST['sendDate'])) {
	$query = "INSERT INTO illdo(objectif, date) VALUES('$sendObjectif', '$sendDate')";
	$req = $bdd->prepare($query);
	$req ->execute(array ($_POST['sendObjectif'], $_POST['sendDate']));

	// Retourner l'identifiant du nouvel objectif en base de donnée
    $output = [
		'id' => $bdd->lastInsertId()
	];
	// Le retourner en JSON
	echo json_encode($output);
	
}


exit(0);
