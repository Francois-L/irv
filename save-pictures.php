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

 $file = !empty($_POST["data"]) ? $_POST['data'] : NULL;
 
 
 if (isset($_POST["file"])) {
    // do php stuff
	$query = "INSERT INTO illdo(image) VALUES('$file')";
	
    // call `json_encode` on `file` object
    $file = json_encode($_POST["file"]);
    // return `file` as `json` string
    echo $file;
};
 

exit(0);
