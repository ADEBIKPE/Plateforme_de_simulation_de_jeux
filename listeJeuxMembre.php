<?php
require_once('roleMembre.php');
$login = $_SESSION['PROFILE']['email'];
$titre = "Mes favoris";
include 'header.inc.php';
include 'menu_membre.php';
?>
<div class="content">
    <div class="container">
        <h1>Mes favoris</h1>

        <?php
        // afficher le message venant lors de l'appel de cette page s'il y en a
        if (isset($_SESSION['message'])) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
            echo $_SESSION['message'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['message']);
        }

        // Connexion :
        require_once("param.inc.php");
        $mysqli = new mysqli($host, $login, $passwd, $dbname);
        if ($mysqli->connect_error) {
            die('Erreur de connexion (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
        }

        $i = 1;
        $idUser = $_SESSION['PROFILE']['idUser']; // Ajoutez cette ligne pour obtenir l'ID de l'utilisateur connecté

        // Utilisez une jointure pour récupérer les jeux associés à l'utilisateur
        if ($stmt = $mysqli->prepare("SELECT jeu.idJeu, jeu.nom, jeu.image FROM jeu INNER JOIN jeu_membre ON jeu.idJeu = jeu_membre.idJeu WHERE jeu_membre.idUser = ?")) {
            $stmt->bind_param("i", $idUser);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($i % 4 == 1) {
                        // Nouvelle ligne Bootstrap à chaque début de série de quatre jeux
                        echo '<div class="row">';
                    }

                    echo '<div class="col-md-3 mb-4">';
                    echo '<div class="card" >';
                    echo '<img src="' . $row['image'] . '" alt="Image du jeu" class="card-img-top" style="max-width: 100%;padding:25px; height: auto;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['nom'] . '</h5>';
                    echo '<a href="delete_gameMembre.php?id=' . $row['idJeu'] . '" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    if ($i % 4 == 0 || $i == $result->num_rows) {
                        // Fermez la ligne Bootstrap à chaque fin de série de quatre jeux ou à la fin de la liste
                        echo '</div>';
                    }

                    $i++;
                }
            } else {
                echo '<h3>Aucun jeu dans les favoris.</h3>';
            }
            $stmt->close();
        }
        ?>

    </div>
</div>
<?php
include 'footer.inc.php';
?>


