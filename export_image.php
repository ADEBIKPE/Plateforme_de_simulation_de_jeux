<?php
require_once("param.inc.php");

// Connexion PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $login, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if (isset($_GET['id'])) {
    // Préparer la requête SQL avec un paramètre nommé
    $stmt = $pdo->prepare("SELECT * FROM jeu WHERE idJeu=? LIMIT 1");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array($_GET['id']));
    
    // Récupérer le résultat
    $tab = $stmt->fetchAll();

    // Vérifier s'il y a des résultats
    if (!empty($tab)) {
        // Récupérer le contenu de l'image depuis la base de données
        $imageContent = $tab[0]["image"];

        // Afficher le contenu de l'image avec l'en-tête approprié
        header("Content-Type: image/jpeg"); // Assurez-vous d'ajuster le type MIME en fonction de votre image
        echo $imageContent;
    } else {
        echo "Aucun résultat trouvé pour l'identifiant fourni.";
    }
}
?>