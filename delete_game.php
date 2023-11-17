<?php
require_once("roleadmin.php");
session_start();

$id=$_GET['id'];
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

//Récupérer le chemin de l'image dans le dossier du site dans la variable $chemin_fichier
if($stmt_chemin=$mysqli->prepare("SELECT image FROM jeu WHERE idJeu=?"))
{
    $stmt_chemin->bind_param("i", $id);
    $stmt_chemin->execute();

    $stmt_chemin->bind_result($chemin_fichier);


    //Si le chemin du fichier existe donc si le fichier existe, on supprime le fichier
    if($chemin_fichier && file_exists($chemin_fichier))
        unlink($chemin_fichier);

    $stmt_chemin->close();
}


//On fait la requête pour supprimer le jeu de la base de données  
if ($stmt = $mysqli->prepare("DELETE FROM jeu WHERE idJeu=?")) 
{
 
  $stmt->bind_param("i", $id);
  $stmt->execute();
}


header("location:listeJeux.php")

?>