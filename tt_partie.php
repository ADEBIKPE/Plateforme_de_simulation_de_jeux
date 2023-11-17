<?php
session_start(); // Pour les messages
//Récupération et test du paramètre
if (isset($_GET['role']) && ctype_digit($_GET['role']))
   {
    $rol = $_GET['role'];
   }

// Contenu du formulaire :
$date_partie= htmlentities($_POST['date_partie']);
$heure = htmlentities($_POST['heure']);
$duree = htmlentities($_POST['duree']);
$nb_max_necessaire = htmlentities($_POST['nb_max_necessaire']);
$idJeu = htmlentities($_POST["idJeu"]);



// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

//Inscrire la partie dans la bdd

if ($stmt = $mysqli->prepare("INSERT INTO partie(date_partie, heure, duree, nb_max_necessaire, idJeu) VALUES (?, ?, ?, ?, ?)")) {
   
    $stmt->bind_param("ssssi", $date_partie, $heure, $duree, $nb_max_necessaire, $idJeu);
    // Le message est mis dans la session, il est préférable de séparer les messages normaux et les messages d'erreur.
    if ($stmt->execute()) {
        $_SESSION['message'] = "Enregistrement réussi";
    } else {
        $_SESSION['message'] = "Impossible d'enregistrer";
    }
}

// Redirection vers la page d'accueil par exemple :

    header('Location: partie.php');

?>
