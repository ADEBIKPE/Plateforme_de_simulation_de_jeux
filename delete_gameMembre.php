<?php

session_start();

$id=$_GET['id'];
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}



//On fait la requête pour supprimer le jeu de la base de données  
if ($stmt = $mysqli->prepare("DELETE FROM jeu_membre WHERE idJeu=?")) 
{
 
  $stmt->bind_param("i", $id);
  $stmt->execute();
}


header("location:listeJeuxMembre.php")

?>