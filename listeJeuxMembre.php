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
        <h1>Contenu</h1>

        <table class="table table-bg">
            <thead>
                <tr>
                    <th scope="row">ID</th>
                    <th scope="row">Nom</th>
                    <th scope="row">Photo</th>
                </tr>
            </thead>
            <tbody>

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

                // Utilisez une jointure pour récupérer les jeux associés à l'utilisateur
                if ($stmt = $mysqli->prepare("SELECT jeu.idJeu, jeu.nom, jeu.image FROM jeu INNER JOIN jeumembre ON jeu.idJeu = jeumembre.idJeu WHERE jeumembre.idUser = ?")) {
                    $stmt->bind_param("i", $idUser);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<th scope="row">' . $i . '</th>';
                        echo '<td>' . $row['nom'] . '</td>';
                        echo '<td><img src="' . $row['image'] . '" alt="Image du jeu" style="max-width: 100px; max-height: 100px;"></td>';
                        echo '</tr>';
                        $i++;
                    }
                    $stmt->close();
                }

                ?>

            </tbody>
        </table>
    </div>
</div>
<?php
include 'footer.inc.php';
?>
