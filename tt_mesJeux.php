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

    //Tester si le jeu a été déjà été ajouté aux favoris

    if($stmtCheckAjout = $mysqli->prepare("SELECT id FROM jeu_membre WHERE idUser = ? AND idJeu = ?")){
            $stmtCheckAjout->bind_param("ii", $idUser, $idJeu);
            $stmtCheckAjout->execute();
            $resultCheckAjout = $stmtCheckAjout->get_result();

            if ($resultCheckAjout->num_rows > 0) {
                // L'utilisateur est déjà inscrit, 
                $_SESSION['message'] = 'Vous avez déjà enregistré ce jeu dans vos favoris';
            } else {

                    // Prépare et exécute la requête d'insertion avec MySQLi
                    $requete = $mysqli->prepare('INSERT INTO jeu_membre (idUser, idJeu) VALUES (?, ?)');
                    $requete->bind_param('ii', $idUser, $idJeu);

                    if ($requete->execute()) {
                         $_SESSION['message'] = 'Ajout d\'un nouveau jeu favori ';
                    } else {
                        $_SESSION['message'] = 'Erreur lors de l\'ajout de ce nouveau jeu favori';
                    }

                    $requete->close(); // Ferme la requête après utilisation
            }
            $stmtCheckAjout->close();
        }// Redirection vers la page Mes Jeux
    header('Location: listeJeuxMembre.php');

    $mysqli->close(); // Ferme la connexion après utilisation
    }
?>