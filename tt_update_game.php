<?php
require_once("roleadmin.php");
session_start();

$id = $_GET['id'];

$nom = htmlentities($_POST['nomjeux']);
$categorie = htmlentities($_POST["categorie"]);
$description = htmlentities($_POST["description"]);

// Initialisez les chemins relatifs
$cheminRelatifRegles = '';
$cheminRelatifImage = '';

// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

// Récupérez les chemins relatifs actuels depuis la base de données
if ($stmtSelectPaths = $mysqli->prepare("SELECT regle, image FROM jeu WHERE idJeu = ?")) {
    $stmtSelectPaths->bind_param("i", $id);
    $stmtSelectPaths->execute();
    $stmtSelectPaths->bind_result($ancienCheminRegles, $ancienCheminImage);
    $stmtSelectPaths->fetch();

    // Utilisez les chemins relatifs actuels comme valeurs par défaut
    $cheminRelatifRegles = $ancienCheminRegles;
    $cheminRelatifImage = $ancienCheminImage;

    $stmtSelectPaths->close();
}

// Mettez à jour la ligne dans la table "jeu"
if ($stmt = $mysqli->prepare("UPDATE jeu SET nom=?, description=?, regle=?, categorie=?, image=? WHERE idJeu=?")) {
    $stmt->bind_param("sssssi", $nom, $description, $cheminRelatifRegles, $categorie, $cheminRelatifImage, $id);

    // Supprimez les anciens fichiers si de nouveaux fichiers sont téléchargés
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        if (!empty($ancienCheminImage) && file_exists($ancienCheminImage)) {
            unlink($ancienCheminImage);
        }
        $destinationImage = "images/";
        $nomFichierImage = basename($_FILES["image"]["name"]);
        $cheminRelatifImage = $destinationImage . $nomFichierImage;
        move_uploaded_file($_FILES["image"]["tmp_name"], $cheminRelatifImage);
    }

    if (isset($_FILES["regles"]) && $_FILES["regles"]["error"] == UPLOAD_ERR_OK) {
        if (!empty($ancienCheminRegles) && file_exists($ancienCheminRegles)) {
            unlink($ancienCheminRegles);
        }
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
