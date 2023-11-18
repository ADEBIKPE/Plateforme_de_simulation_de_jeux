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
    // Préparer et exécuter la requête SQL pour obtenir toutes les lignes
    $stmt = $mysqli->prepare("SELECT * FROM jeu");
    $stmt->execute();
    $result = $stmt->get_result();

    // Stocker les résultats dans un tableau
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    // Fermer la connexion à la base de données
    $stmt->close();
    $mysqli->close();

    // Afficher chaque groupe de quatre images par élément du carrousel
    $i = 0;
    foreach (array_chunk($rows, 4) as $group) {
        $activeClass = ($i == 0) ? 'active' : ''; // Ajoutez la classe 'active' à la première image du groupe

        echo '<div class="carousel-item ' . $activeClass . '">';
        echo '<div class="row">';

        // Récupérer et afficher chaque image du groupe
        foreach ($group as $row) {
            echo '<div class="col-md-3 custom-slide">';
            echo '<div class="image-container">';
            echo '<img src="' . $row['image'] . '" class="d-block w-100" alt="Image du jeu">';
            echo '<div class="buttons">';

            // Ajouter un formulaire avec un bouton "Ajouter" pour chaque jeu
            echo '<form method="POST" action="tt_mesJeux.php">';
            echo '<input type="hidden" name="idUser" value="' . $membreId . '">';
            echo '<input type="hidden" name="idJeu" value="' . $row['idJeu'] . '">';
            echo '<button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>';

            
            echo '<button class="btn btn-secondary" onclick="showDetails(\'' . htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') . '\')">Détails</button>';

            echo '</form>';
            
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';

        $i++;
    }
    ?>
    <script>
    function showDetails(detail) {
        // Utilisez la fonction prompt pour afficher une boîte de dialogue avec le détail
        alert('Détails du jeu :\n' + detail);
    }
</script>

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
        <table class="table table-bg">
    <thead>
        <tr>
            <th scope="row">#</th>
            <th scope="row">Jeu</th>
            <th scope="row">Date</th>
            <th scope="row">Heure</th>
            <th scope="row">Nombre nécessaire</th>
            <th scope="row">Nombre Inscrits</th>
            <th scope="row">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    require_once("param.inc.php");
    $mysqli = new mysqli($host, $login, $passwd, $dbname);
    if ($mysqli->connect_error) {
        die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $i = 1;
    $idUser = $_SESSION['PROFILE']['idUser'];

    if ($stmt = $mysqli->prepare("SELECT partie.*, jeu.nom AS nomJeu, COUNT(inscription_Partie.idPartie) AS nombreInscrits 
                                  FROM partie 
                                  LEFT JOIN jeu ON partie.idJeu = jeu.idJeu
                                  LEFT JOIN inscription_Partie ON partie.idPartie = inscription_Partie.idPartie
                                  GROUP BY partie.idPartie")) {
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $idPartie = $row['idPartie'];

            // Vérifier si l'utilisateur est déjà inscrit à la partie
            $stmtCheckInscription = $mysqli->prepare("SELECT idInscription_Partie FROM inscription_Partie WHERE idUser = ? AND idPartie = ?");
            $stmtCheckInscription->bind_param("ii", $idUser, $idPartie);
            $stmtCheckInscription->execute();
            $resultCheckInscription = $stmtCheckInscription->get_result();

            echo '<tr>';
            echo '<th scope="row">' . $i . '</th>';
            echo '<td>' . $row['nomJeu'] . '</td>';
            echo '<td>' . $row['date_partie'] . '</td>';
            echo '<td>' . $row['heure'] . '</td>';
            echo '<td>' . $row['nb_max_necessaire'] . '</td>';
            echo '<td>' . $row['nombreInscrits'] . '</td>';

            // Afficher le bouton Participer uniquement si l'utilisateur n'est pas déjà inscrit
            if ($resultCheckInscription->num_rows == 0) {
                echo '<td><a href="tt_inscriptionMembre.php?id=' . $row['idPartie'] . '" class="btn btn-danger">Participer</a></td>';
            } else {
                echo '<td>Déjà inscrit</td>';
            }

            echo '</tr>';
            $i++;

            $stmtCheckInscription->close();
        }
    }
    // Insérer l'historique de la partie dans la table historique_parties
$stmtHistorique = $mysqli->prepare("INSERT INTO historique_parties (idUser, idPartie, date_joue) VALUES (?, ?, NOW())");
$stmtHistorique->bind_param("ii", $idUser, $idPartie);
$stmtHistorique->execute();
$stmtHistorique->close();

    $mysqli->close();
    ?>
</tbody>

</table>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>


<?php
include 'footer.inc.php';
?>