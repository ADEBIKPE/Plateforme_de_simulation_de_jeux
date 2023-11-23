<?php
require_once("roleadmin.php");
session_start();

$id = $_GET['id'];

// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

// Récupérer le chemin de l'image dans le dossier du site dans la variable $chemin_fichier
$chemin_fichier = null; // Initialisez la variable à null

if ($stmt_chemin = $mysqli->prepare("SELECT image FROM jeu WHERE idJeu=?")) {
    $stmt_chemin->bind_param("i", $id);
    $stmt_chemin->execute();
    $stmt_chemin->bind_result($chemin_fichier);

    // Si le chemin du fichier existe donc si le fichier existe, on supprime le fichier
    if ($stmt_chemin->fetch() && $chemin_fichier && file_exists($chemin_fichier)) {
        unlink($chemin_fichier);
        echo "Image supprimée avec succès.";
    } else {
        echo "L'image n'existe pas ou le chemin est incorrect.";
    }

    $stmt_chemin->close();
}

// Récupérer le chemin du pdf (règles) dans le dossier du site dans la variable $chemin_fichier
$chemin_fichierRegle = null; // Initialisez la variable à null

if ($stmt_chemin = $mysqli->prepare("SELECT regle FROM jeu WHERE idJeu=?")) {
    $stmt_chemin->bind_param("i", $id);
    $stmt_chemin->execute();
    $stmt_chemin->bind_result($chemin_fichierRegle);

    // Si le chemin du fichier existe donc si le fichier existe, on supprime le fichier
    if ($stmt_chemin->fetch() && $chemin_fichierRegle && file_exists($chemin_fichierRegle)) {
        unlink($chemin_fichierRegle);
        echo "Fichier PDF supprimé avec succès.";
    } else {
        echo "Le fichier PDF n'existe pas ou le chemin est incorrect.";
    }

    $stmt_chemin->close();
}

// On fait la requête pour supprimer le jeu de la base de données  
if ($stmt = $mysqli->prepare("DELETE FROM jeu WHERE idJeu=?")) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $_SESSION['message'] = "Suppression de jeu réussie";
}
else
    $_SESSION['message'] = "Suppression de jeu échouée";

$mysqli->close();

header("location: listeJeux.php");
?>
