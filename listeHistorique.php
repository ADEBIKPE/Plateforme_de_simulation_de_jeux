<?php
require_once('roleMembre.php');
$login = $_SESSION['PROFILE']['email'];
$titre = "Historique";
include 'header.inc.php';
include 'menu_membre.php';
?>
<div class="content">
    <div class="container">


        <?php

        // Connexion :
        require_once("param.inc.php");
        $mysqli = new mysqli($host, $login, $passwd, $dbname);
        if ($mysqli->connect_error) {
            die('Erreur de connexion (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
        }

        $i = 1;
        $idUser = $_SESSION['PROFILE']['idUser']; // Ajoutez cette ligne pour obtenir l'ID de l'utilisateur connecté
        
        // Dans la section où vous affichez le contenu pour l'utilisateur
        
        // On récupère uniquement les parties auxquelles l'utilisateur s'est inscrit et dont la date est passée
        if ($stmtHistorique = $mysqli->prepare("SELECT partie.*, jeu.nom AS nomJeu
        FROM partie
        INNER JOIN jeu ON partie.idJeu = jeu.idJeu
        INNER JOIN inscription ON partie.idPartie = inscription.idPartie AND inscription.statut_inscription=1
        WHERE inscription.idUser = ?
        AND partie.date_partie < CURDATE()")) {
            $stmtHistorique->bind_param("i", $idUser);
            $stmtHistorique->execute();
            $resultHistorique = $stmtHistorique->get_result();
            if( $resultHistorique->num_rows > 0) {

                    echo '<h2>Historique des jeux joués</h2>';
                    echo '<table class="table table-bg">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Jeu</th>';
                    echo '<th scope="col">Date</th>';
                    echo '<th scope="col">Heure</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    $i = 1;
                    while ($rowHistorique = $resultHistorique->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $rowHistorique['nomJeu'] . '</td>';
                        echo '<td>' . $rowHistorique['date_partie'] . '</td>';
                        echo '<td>' . $rowHistorique['heure'] . '</td>';
                        echo '</tr>';
                        $i++;
                    }

                    echo '</tbody>';
                    echo '</table>';

                    $stmtHistorique->close();
                }else{
                    echo "<h3>Vous n'avez encore joué aucune partie</h3>";
                }
    }

        ?>


    </div>
</div>
<?php
include 'footer.inc.php';
?>