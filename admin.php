<?php
require_once("roleadmin.php");

$titre = "Validation";
include 'header.inc.php';
include 'menu_admin.php';
?>
<div class="content" style="background-color:#333;color:white;padding:25px;">
    <div class="container">
        <h2 style="font-family: 'Bodoni MTsplay',serif; font-size: 40px; font-weight:bold; font-style:italic;">Inscriptions en attente de validation</h2>
        <div></br></div>

        <?php
        // Connexion :
        require_once("param.inc.php");
        $mysqli = new mysqli($host, $login, $passwd, $dbname);
        if ($mysqli->connect_error) {
            die('Erreur de connexion (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
        }

        $i = 1;

        // On fait une requête pour récupérer les inscriptions en attente de validation
        if ($stmt = $mysqli->prepare("SELECT inscription.*, user.nom AS nomMembre,user.prenom AS prenomMembre,user.idUser AS idUser,
        jeu.nom AS nomJeu, partie.date_partie AS date_partie, partie.heure AS heure
        FROM inscription 
        INNER JOIN user ON inscription.idUser = user.idUser
        LEFT JOIN partie ON inscription.idPartie = partie.idPartie
        LEFT JOIN jeu ON partie.idJeu = jeu.idJeu
        WHERE inscription.statut_inscription = 0
        GROUP BY inscription.id")) {

            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Inscription #<?php echo $i; ?></h5>
                            <p class="card-text">Jeu: <?php echo $row['nomJeu']; ?></p>
                            <p class="card-text">Date: <?php echo $row['date_partie']; ?></p>
                            <p class="card-text">Heure: <?php echo $row['heure']; ?></p>
                            <p class="card-text">Membre: <?php echo $row['nomMembre'] . ' ' . $row['prenomMembre']; ?></p>
                            <a href="validation.php?valeur=1&idInscription=<?php echo $row['id']; ?>&idUser=<?php echo $row['idUser']; ?>" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
                            <a href="validation.php?valeur=2&idInscription=<?php echo $row['id']; ?>&idUser=<?php echo $row['idUser']; ?>" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></a>
                        </div>
                    </div>
        <?php
                    $i++;
                }
            } else {
                echo '<h3>Aucune inscription à valider</h3>';
            }
        }
        ?>
    </div>
</div>
<?php
include 'footer.inc.php';
?>