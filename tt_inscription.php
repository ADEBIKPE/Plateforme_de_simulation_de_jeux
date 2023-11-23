<?php
session_start(); // Pour les messages
//Récupération et test du paramètre
if (isset($_GET['role']) && ctype_digit($_GET['role']))
   {
    $rol = $_GET['role'];
   }

   if($rol==1)
   {
    require("admin.php");
   }

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
    //On récupère le rôle passé en paramètre dans $role
$role=$rol;

// Vérifie si l'utilisateur avec cet email existe déjà

if ($stmt = $mysqli->prepare("SELECT idUser FROM user WHERE email = ?")) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // L'utilisateur existe déjà, affichez un message d'erreur approprié
        $_SESSION['message'] = "Vous êtes déjà inscrit";
    } else {
        // L'utilisateur n'existe pas, procédez à l'insertion
        $role = $rol; // Assurez-vous que $rol est défini

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
    }
} else {
    $_SESSION['message'] = "Erreur de préparation de la requête.";
}




// Redirection vers la page d'accueil par exemple :
if($role==2)
    header('Location: connexion.php');
else
    header('Location: inscription.php?role=1');
?>
