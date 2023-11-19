<?php
session_start();

if (isset($_GET['id']) && ctype_digit($_GET['id']))
   {
    $idPartie = $_GET['id'];
   }

// Connexion à la base de données
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);

// Vérification de la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}


   
    $idUser = $_SESSION['PROFILE']['idUser'];

    //Tester si l'utilisateur est déjà inscrit et sinon, l'inscrire.
    if($stmtCheckInscription = $mysqli->prepare("SELECT id FROM inscription WHERE idUser = ? AND idPartie = ?")){

   
            $stmtCheckInscription->bind_param("ii", $idUser, $idPartie);
            $stmtCheckInscription->execute();
            $resultCheckInscription = $stmtCheckInscription->get_result();

            if ($resultCheckInscription->num_rows > 0) {
                // L'utilisateur est déjà inscrit, 
                $_SESSION['message'] = 'Vous êtes déjà inscrit à cette partie.';
            } else {
                // L'utilisateur n'est pas encore inscrit, procédez à l'inscription
                if($stmtInscription = $mysqli->prepare("INSERT INTO inscription (idPartie,idUser) VALUES (?, ?)")){
                    $stmtInscription->bind_param("ii", $idPartie, $idUser);

                if ($stmtInscription->execute()) {
                    $_SESSION['message'] = "Inscription réussie à la partie.";
                } else {
                    $_SESSION['message'] = "Erreur lors de l'inscription à la partie.";
                }

                $stmtInscription->close();
                }
                
            }
            $stmtCheckInscription->close();
    }

    /* Insérer l'historique de la partie dans la table historique_parties
    $stmtHistorique = $mysqli->prepare("INSERT INTO historique_parties (idUser, idPartie, date_joue) VALUES (?, ?, NOW())");
    $stmtHistorique->bind_param("ii", $idUser, $idPartie);
    $stmtHistorique->execute();
    $stmtHistorique->close();*/
    
    // Redirection vers la page d'accueil ou une autre page en fonction de votre logique
    header('Location: accueil.php');

?>
