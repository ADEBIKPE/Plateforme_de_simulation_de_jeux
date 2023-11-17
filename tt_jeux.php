<?php
  session_start(); // Pour les messages

$nom=$_POST['nomjeux'];
$categorie = $_POST["categorie"];
$description = $_POST["description"];


 //On enregistre l'image dans le dossier images et on stocke le chemin dans la base de données
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
  $destinationImage = "images/";
  $nomFichierImage = basename($_FILES["image"]["name"]);
  $cheminRelatifImage = $destinationImage . $nomFichierImage;
  move_uploaded_file($_FILES["image"]["tmp_name"], $cheminRelatifImage);
  //$imageContent=file_get_contents($_FILES["image"]["tmp_name"]);

}

 // On enregistre les règles dans un dossier règles et on stocke le chemin dans la base de données
 if (isset($_FILES["regles"]) && $_FILES["regles"]["error"] == UPLOAD_ERR_OK) {
  $destinationRegles = "règles/";
  $nomFichierRegles = basename($_FILES["regles"]["name"]);
  $cheminRelatifRegles = $destinationRegles . $nomFichierRegles;
  move_uploaded_file($_FILES["regles"]["tmp_name"], $cheminRelatifRegles);
  //$reglesContent=file_get_contents($_FILES["regles"]["tmp_name"]);


  
}

 // Connexion :
 require_once("param.inc.php");
 $mysqli = new mysqli($host, $login, $passwd, $dbname);
 if ($mysqli->connect_error) {
     die('Erreur de connexion (' . $mysqli->connect_errno . ') '
             . $mysqli->connect_error);
 }

 if ($stmt = $mysqli->prepare("INSERT INTO jeu(nom, description, regle, categorie, image) VALUES (?, ?, ?, ?, ?)")) {
  $stmt->bind_param("sssss", $nom, $description,$cheminRelatifRegles, $categorie, $cheminRelatifImage);
  // Le message est mis dans la session, il est préférable de séparer message normal et message d'erreur.
  if($stmt->execute()) {
      $_SESSION['message'] = "Enregistrement réussi";

  } else {
      $_SESSION['message'] =  "Impossible d'enregistrer";
  }
}
// Redirection vers la page d'ajout de jeux
header('Location: jeux.php');
?>

