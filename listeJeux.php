
<?php
require_once("roleadmin.php");

$titre = "Liste Jeux";
include 'header.inc.php';
include 'menu_admin.php';
?>
<div class="content" style="background-color:#333;color:white;padding:25px;">
    <div class="container">
        <h2 style="font-family: 'Bodoni MTsplay',serif; font-size: 40px; font-weight:bold; font-style:italic;">Jeux</h2>
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
                    echo '<div class="col-lg-4 ">';
                    echo '<td><a target="_blank" href="details.php?id=' . $row['idJeu'] . '" style="color:black"><i class="fa-regular fa-eye"></i></a></td></t>';
                    echo '</div >';
                    echo '<div class="col-lg-4 ">';
                    echo '<td><a href="update_game.php?id=' . $row['idJeu'] . '" style="color:blue"><i class="fa-solid fa-pen"></i></i></a></td></t> ';
                    echo '</div >';
                    echo '<div class="col-lg-4 ">';
                    echo '<td><a href="delete_game.php?id=' . $row['idJeu'] . '" style="color:red"><i class="fa-solid fa-delete-left"></i></a></td></t>';
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

