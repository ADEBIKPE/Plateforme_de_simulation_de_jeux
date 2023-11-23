
<?php
require_once('roleMembre.php');

$titre = "Liste Jeux";
include 'header.inc.php';
include 'menu_membre.php';
?>
<div class="content">
    <div class="container">
        <h1>Jeux</h1>
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
        if ($stmt = $mysqli->prepare("SELECT * FROM jeu")) {
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Commencer une nouvelle ligne pour chaque groupe de quatre jeux
                    if ($i % 4 == 1) {
                        echo '<div class="row">';
                    }

                    $idGame = $row['idJeu'];
                    $chemin = $row['image'];
                    echo '<div class="col-lg-3 col-md-4 col-sm-12">';
                    echo '<div class="card">';
                    echo '<img src="' . $row['image'] . '" style="height: 300px;padding:25px;"alt="Image du jeu" style="max-width: 100px; max-height: 100px;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['nom'] . '</h5>';
                    echo '<div class="row">';
                    echo '<div class="col-lg-6 ">';
                    echo '<td><a target="_blank" href="details.php?id=' . $idGame . '" style="color:black"><i class="fa-regular fa-eye"></i></a></td></t>';
                    echo '</div >';
                    echo '<div class="col-lg-6 ">';
                    echo '<form method="POST" action="tt_mesJeux.php" >';
                    echo '<input type="hidden" name="idUser" value="' . $_SESSION['PROFILE']['idUser']. '">';
                    echo '<input type="hidden" name="idJeu" value="' . $row['idJeu'] . '">';
                    echo '<button  type="submit" name="ajouter" class="btn btn-primary"><i class="fa-regular fa-thumbs-up"></i></button>';
                    echo '</form>';
                    echo '</div >';
                    echo '</div >';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    // Terminer la ligne pour chaque groupe de quatre jeux
                    if ($i % 4 == 0) {
                        echo '</div></br></br></br>';
                    }

                    $i++;
                }

                // Terminer la dernière ligne si le nombre total de jeux n'est pas un multiple de quatre
                if ($i % 4 != 1) {
                    echo '</div>';
                }
            } else {
                echo '<h3>Aucun jeu enregistré.</h3>';
            }
        }
        ?>

    </div>
</div>
<?php
include 'footer.inc.php';
?>

