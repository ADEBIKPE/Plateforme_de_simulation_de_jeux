<?php
session_start();
// Connexion à la base de données
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);

// Vérification de la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Vérifie si le formulaire a été soumis
if (isset($_POST['ajouter'])) {
    // Récupère les valeurs du formulaire
    $idUser = isset($_POST['idUser']) ? intval($_POST['idUser']) : 0; // Assurez-vous que c'est un entier
    $idJeu = isset($_POST['idJeu']) ? intval($_POST['idJeu']) : 0; // Assurez-vous que c'est un entier

    // Prépare et exécute la requête d'insertion avec MySQLi
    $requete = $mysqli->prepare('INSERT INTO jeu_membre (idUser, idJeu) VALUES (?, ?)');
    $requete->bind_param('ii', $idUser, $idJeu);

    if ($requete->execute()) {
        echo 'Enregistrement réussi dans la table jeumembre.';
    } else {
        echo 'Erreur lors de l\'enregistrement dans la table jeumembre.';
    }

    $requete->close(); // Ferme la requête après utilisation
}// Redirection vers la page d'ajout de jeux
header('Location: accueil.php');

$mysqli->close(); // Ferme la connexion après utilisation
?>
