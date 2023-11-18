<?php
session_start();
if (!isset($_SESSION['PROFILE'])) {
    $_SESSION['erreur'] = "Vous devez être connecté";
    header('Location: index.php');
}
$login = $_SESSION['PROFILE']['email'];
$titre = "Chez " . $login;
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
        
        // Récupérer l'historique des jeux pour l'utilisateur actuel
        if ($stmtHistorique = $mysqli->prepare("SELECT jeu.nom AS nomJeu, partie.date_partie, partie.heure
                                               FROM historique_parties
                                            INNER JOIN partie ON historique_parties.idPartie = partie.idPartie
                                            INNER JOIN jeu ON partie.idJeu = jeu.idJeu
                                            WHERE historique_parties.idUser = ?
                                            ORDER BY partie.date_partie DESC")) {
            $stmtHistorique->bind_param("i", $idUser);
            $stmtHistorique->execute();
            $resultHistorique = $stmtHistorique->get_result();

            echo '<h2>Historique des jeux joués</h2>';
            echo '<table class="table table-bg">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">#</th>';
            echo '<th scope="col">Jeu</th>';
            echo '<th scope="col">Date</th>';
            echo '<th scope="col">Heure</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $i = 1;
            while ($rowHistorique = $resultHistorique->fetch_assoc()) {
                echo '<tr>';
                echo '<th scope="row">' . $i . '</th>';
                echo '<td>' . $rowHistorique['nomJeu'] . '</td>';
                echo '<td>' . $rowHistorique['date_partie'] . '</td>';
                echo '<td>' . $rowHistorique['heure'] . '</td>';
                echo '</tr>';
                $i++;
            }

            echo '</tbody>';
            echo '</table>';

            $stmtHistorique->close();
        }

        ?>


    </div>
</div>
<?php
include 'footer.inc.php';
?>