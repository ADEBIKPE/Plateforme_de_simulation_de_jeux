<!-- Affichage des règles. Exportation du fichier nom_du_fichier.pdf. Toujours envoyer l'idJeu en paramètre.-->

<?php
 $titre = "Règles";

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
    $result = $stmt->fetch();

    // Vérifier s'il y a des résultats
    if ($result) {
        // Récupérer le contenu du PDF depuis la base de données
        $pdfContent = $result["regle"];

        // Définir l'en-tête du type de contenu
        header("Content-Type: application/pdf");
        
        // Afficher le contenu du PDF
        echo $pdfContent;
    } else {
        echo "Aucun résultat trouvé pour l'identifiant fourni.";
    }
}
?>


?>