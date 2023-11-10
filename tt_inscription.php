<?php
session_start(); // Pour les messages

// Contenu du formulaire :
$nom = htmlentities($_POST['nom']);
$prenom = htmlentities($_POST['prenom']);
$email = htmlentities($_POST['email']);
$password = htmlentities($_POST['password']);
$dateNaissance = htmlentities($_POST['dateNaissance']);
$nomAvatar = htmlentities($_POST['nomAvatar']);
$role = 2; // Par défaut, le rôle est membre (2)

// Option pour bcrypt
$options = [
    'cost' => 12,
];

// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

// Insérez ici la logique pour déterminer le rôle en fonction des besoins.
// Par exemple, si vous avez une option pour sélectionner le rôle dans le formulaire.

// Si l'option "role" est égale à "1" (administrateur), vous pouvez le modifier :
if (isset($_POST['role']) && $_POST['role'] == 1) {
    $role = 1; // 1 pour administrateur
}

if ($stmt = $mysqli->prepare("INSERT INTO user(nom, prenom, email, passwd, date_de_naissance, nom_de_avatar, role) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
    $password = password_hash($password, PASSWORD_BCRYPT, $options);
    $stmt->bind_param("ssssssi", $nom, $prenom, $email, $password, $dateNaissance, $nomAvatar, $role);
    // Le message est mis dans la session, il est préférable de séparer les messages normaux et les messages d'erreur.
    if ($stmt->execute()) {
        $_SESSION['message'] = "Enregistrement réussi";
    } else {
        $_SESSION['message'] = "Impossible d'enregistrer";
    }
}

// Redirection vers la page d'accueil par exemple :
header('Location: connexion.php');
?>
