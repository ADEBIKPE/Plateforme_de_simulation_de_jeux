<?php
session_start();
if(!(isset($_SESSION['PROFILE']) ))
header("location:connexion.php");
if(!($_SESSION['PROFILE']["role"]==2) )//si l'utilisateur est Membre
{
    echo 'Reconnectez-vous';
    header("location:index.php");//à vous de décider...!! Moi je renvoie vers la page connexion. 

}
    

?>