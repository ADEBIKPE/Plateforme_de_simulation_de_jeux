<?php
require_once("roleadmin.php");

$id=$_GET['id'];
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($stmt = $mysqli->prepare("DELETE FROM partie WHERE idPartie=?")) 
{
 
  $stmt->bind_param("i", $id);
  $stmt->execute();
}


header("location:listePartie.php")

?>