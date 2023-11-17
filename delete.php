<?php
require_once("roleadmin.php");
session_start();
//On récupère le paramètre et on le teste
if (isset($_GET['choix']) && ctype_digit($_GET['choix']))
   {
    $choix = $_GET['choix'];
   }
$email=$_GET['email'];
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($stmt = $mysqli->prepare("DELETE FROM user WHERE email=?")) 
{
 
  $stmt->bind_param("s", $email);
  $stmt->execute();
}


header("location:listeMembres.php")

?>