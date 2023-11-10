<?php
session_start();
if(!(isset($_SESSION['PROFILE']) ))
header("location:connexion.php");
if(!($_SESSION['PROFILE']["role"]==1) )//si l'utilisateur est Administrateur
    header("location:admin.php");//à vous de décider...!! Moi je renvoie vers la page connexion. 


?>