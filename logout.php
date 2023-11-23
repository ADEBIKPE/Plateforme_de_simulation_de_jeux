<?php
session_start();
session_destroy();

session_start();
$_SESSION['deco_message']="Déconnexion réussie";

header("location:index.php");
?>