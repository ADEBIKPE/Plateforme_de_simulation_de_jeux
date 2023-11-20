<?php
require_once("roleadmin.php");
session_start();

$id = $_GET['id'];

$nom = htmlentities($_POST['nomjeux']);
$categorie = htmlentities($_POST["categorie"]);
$description = htmlentities($_POST["description"]);

// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

// Mettez à jour la ligne dans la table "jeu"
if ($stmt = $mysqli->prepare("UPDATE jeu SET nom=?, description=?, regle=?, categorie=?, image=? WHERE idJeu=?")) {
    $stmt->bind_param("sssssi", $nom, $description, $cheminRelatifRegles, $categorie, $cheminRelatifImage, $id);

    // On enregistre l'image dans le dossier images et on stocke le chemin dans la base de données
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $destinationImage = "images/";
        $nomFichierImage = basename($_FILES["image"]["name"]);
        $cheminRelatifImage = $destinationImage . $nomFichierImage;
        move_uploaded_file($_FILES["image"]["tmp_name"], $cheminRelatifImage);
    }

    // On enregistre les règles dans un dossier règles et on stocke le chemin dans la base de données
    if (isset($_FILES["regles"]) && $_FILES["regles"]["error"] == UPLOAD_ERR_OK) {
        $destinationRegles = "règles/";
        $nomFichierRegles = basename($_FILES["regles"]["name"]);
        $cheminRelatifRegles = $destinationRegles . $nomFichierRegles;
        move_uploaded_file($_FILES["regles"]["tmp_name"], $cheminRelatifRegles);
    }

    // Exécutez la mise à jour
    if ($stmt->execute()) {
        $_SESSION['message'] = "Mise à jour réussie";
    } else {
        $_SESSION['message'] = "Impossible de mettre à jour";
    }

    $stmt->close();
}

// Redirection vers la page des listes de jeux
header("location:listeJeux.php");
?>
