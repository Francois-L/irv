<?php


 //Ton traitement de tri


error_reporting(E_ALL | E_STRICT);

// Configuration de l'upload
$UPLOAD_DIRECTORY = __DIR__.'/uploads/';
$UPLOAD_MAX_SIZE = 900400; // octets
$UPLOAD_EXTENSIONS = ['png','jpg','jpeg'];

function upload($index, $directory, $filename, $maxsize, $extensions)
{
   //Test1: fichier correctement uploadé
   if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) {
       echo 'Fichier absent ou en erreur';
       return false;
   }

   //Test2: taille limite
   if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) {
       echo 'Fichier trop gros';
       return false;
   }

   //Test3: extension
   $ext = substr(strrchr($_FILES[$index]['name'], '.'), 1);
   if ($extensions !== FALSE AND !in_array($ext,$extensions)) {
       echo 'Fichier dont l\'extension n\'est pas autorisée';
       return false;
   }

   // Si tu veux retailler ton image ou créer une miniature ça se fera ici 
   // L'image est dans $_FILES[$index]['tmp_name']
   


   // Déplacement
   $fullname = $filename.'.'.$ext;
   if(move_uploaded_file($_FILES[$index]['tmp_name'], $directory.$fullname)) {
       return $fullname;
   }

   // Erreur
   echo 'Fichier tmp impossible à déplacer de ' . $_FILES[$index]['tmp_name'] .' vers '. $directory.$fullname;
   return false;
}

$idTarget = $_POST['target_id'];
$filename = upload('target_picture', $UPLOAD_DIRECTORY, $idTarget, $UPLOAD_MAX_SIZE, $UPLOAD_EXTENSIONS);

if ($filename !== false) {

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=illdobdd', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

	$query = "UPDATE illdo SET image=:filename WHERE id=:id";
    $req = $bdd->prepare($query);
	$req->bindParam(':filename', $filename);
	$req->bindParam(':id', $idTarget);
	$req->execute();

    echo 'OK';
} else {
    echo 'KO';
}


 

exit(0);
