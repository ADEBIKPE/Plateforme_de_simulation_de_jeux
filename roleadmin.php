<?php
session_start();
if(!(isset($_SESSION['PROFILE']) ))
header("location:connexion.php");
if(!($_SESSION['PROFILE']["role"]==1) )//si l'utilisateur n'est pas Administrateur
{
    $_SESSION['deco_message']="Vous n'êtes pas administrateur";
    header("location:index.php");//à vous de décider...!! Moi je renvoie vers la page connexion. 
}
    


?>