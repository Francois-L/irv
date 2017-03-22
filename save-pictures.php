<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}


 //Ton traitement de tri

 
    $data['file'] = $_FILES;
	$uploads_dir = 'uploads';
	move_uploaded_file($data, '$uploads_dir/$data');
	
    echo json_encode($data);


	
		
	
exit(0);
