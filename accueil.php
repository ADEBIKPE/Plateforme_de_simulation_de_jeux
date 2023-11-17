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
<div class="content" id="accueil">
    <div class="container" id="container_membre">

        <?php
        if (isset($_SESSION['PROFILE']['role'])) {
            $role = $_SESSION['PROFILE']['role'];

            if ($role == 1) {
                // Vous êtes administrateur, vous pouvez afficher le nom de l'administrateur ici
                if (isset($_SESSION['PROFILE']['id'])) {
                    $adminId = $_SESSION['PROFILE']['id'];

                    require_once("param.inc.php");
                    $mysqli = new mysqli($host, $login, $passwd, $dbname);
                    if ($mysqli->connect_error) {
                        die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
                    }

                    $query = "SELECT nom FROM user WHERE idUser = $adminId";
                    $result = $mysqli->query($query);

                    if ($result->num_rows > 0) {
                        $admin = $result->fetch_assoc();
                        echo "Vous êtes administrateur, " . $admin['nom'];
                    } else {
                        echo "Nom non trouvé pour cet administrateur.";
                    }
                } else {
                    echo "ID de l'administrateur non défini dans la session.";
                }
            } elseif ($role == 2) {
                if (isset($_SESSION['PROFILE']['idUser'])) {
                    // Vous êtes membre, vous pouvez afficher le nom du membre ici
                    $membreId = $_SESSION['PROFILE']['idUser'];

                    require_once("param.inc.php");
                    $mysqli = new mysqli($host, $login, $passwd, $dbname);
                    if ($mysqli->connect_error) {
                        die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
                    }

                    $query = "SELECT nom_de_avatar FROM user WHERE idUser = $membreId";
                    $result = $mysqli->query($query);

                    if ($result->num_rows > 0) {
                        $membre = $result->fetch_assoc();
                        echo '<span class="bold-text">BIENVENU(E) <span class="bold-text-small">' . $membre['nom_de_avatar'] . '</span></span>';
                    } else {
                        echo "Nom non trouvé pour cet utilisateur.";
                    }
                } else {
                    echo "ID du membre non défini dans la session.";
                }
            }
        } else {
            echo "Rôle non défini pour cet utilisateur.";
        }
        ?>
    </div>

    <div id="imageCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">

    <div class="carousel-inner">
    <?php
    // Connexion à la base de données
    require_once("param.inc.php");
    $mysqli = new mysqli($host, $login, $passwd, $dbname);
    if ($mysqli->connect_error) {
        die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    $idUser = $_SESSION['PROFILE']['idUser'];
    // Préparez et exécutez la requête SQL pour obtenir toutes les lignes
    $stmt = $mysqli->prepare("SELECT * FROM jeu");
    $stmt->execute();
    $result = $stmt->get_result();

    // Stockez les résultats dans un tableau
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    // Fermez la connexion à la base de données
    $stmt->close();
    $mysqli->close();

    // Affichez chaque groupe de quatre images par élément du carrousel
    $i = 0;
    foreach (array_chunk($rows, 4) as $group) {
        $activeClass = ($i == 0) ? 'active' : ''; // Ajoutez la classe 'active' à la première image du groupe

        echo '<div class="carousel-item ' . $activeClass . '">';
        echo '<div class="row">';

        // Récupérez et affichez chaque image du groupe
        foreach ($group as $row) {
            echo '<div class="col-md-3 custom-slide">';
            echo '<div class="image-container">';
            echo '<img src="' . $row['image'] . '" class="d-block w-100" alt="Image du jeu">';
            echo '<div class="buttons">';

            // Ajoutez un formulaire avec un bouton "Ajouter" pour chaque jeu
            echo '<form method="POST" action="tt_mesJeux.php">';
            echo '<input type="hidden" name="idUser" value="' . $membreId . '">';
            echo '<input type="hidden" name="idJeu" value="' . $row['idJeu'] . '">';
            echo '<button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>';
            echo '</form>';
            echo '<button type="button" class="btn btn-secondary">Details</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';

        $i++;
    }
    ?>
</div>






        <!-- Flèche de contrôle gauche -->
        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Flèche de contrôle droite -->
        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
    <!-- Section pour les parties à venir -->
    <div class="section_P">
        <h2>Prochaines Parties</h2>
        <div class="flex-container">
            <!-- Ajoutez ici les informations sur les parties à venir -->
            <div class="section_1">
                <h3 class="party-title">Nom de la partie 1</h3>
                <p>Date : 01/01/2023</p>
                <p>Heure : 18h00</p>
            </div>
            <div class="section_2">
                <h3 class="party-title">Nom de la partie 2</h3>
                <p>Date : 02/01/2023</p>
                <p>Heure : 20h00</p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>


<?php
include 'footer.inc.php';
?>