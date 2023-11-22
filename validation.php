<?php

require_once("roleadmin.php");
$valeur=$_GET['valeur'];
$idInscription=$_GET['idInscription'];
$idUser=$_GET['idUser'];

$valeur=htmlentities($valeur);
$idInscription=htmlentities($idInscription);
$idUser=htmlentities($idUser);

// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}



if ($stmt = $mysqli->prepare("UPDATE inscription SET statut_inscription=? WHERE inscription.idUser=$idUser AND inscription.id=$idInscription")) 
{
 
  $stmt->bind_param("s", $valeur);
  $stmt->execute();
}  

if($valeur==1)
{
    $_SESSION['message'][$idUser]="Inscription confirmée";
   
}
if($valeur==2)
{
    $_SESSION['message'][$idUser]="Inscription refusée";
    
}





/*echo $valeur. '   '; 
echo $idInscription. '   ';
echo $idUser;*/

header('Location: admin.php');


?>