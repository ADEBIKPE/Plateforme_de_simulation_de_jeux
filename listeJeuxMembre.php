<?php
session_start();
if (!isset($_SESSION['PROFILE'])) {
    $_SESSION['erreur'] = "Vous devez être connecté";
    header('Location: index.php');
}
$login = $_SESSION['PROFILE']['email'];
$titre = "Mes favoris" ;
include 'header.inc.php';
include 'menu_membre.php';
?>
<div class="content">
    <div class="container">
        <h1>Mes favoris</h1>

        <table class="table table-bg">
            
            <tbody>

                <?php

                 //afficher le message venant lors de l'appel de cette page s'il y en a
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
                        echo '<thead>
                      <tr>
                        <th scope="row">#</th>
                        <th scope="row">Nom</th>
                        <th scope="row">Photo</th>
                        <th scope="row">Action</th>
                        
                      </tr>
                    </thead>';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<th scope="row">' . $i . '</th>';
                        echo '<td>' . $row['nom'] . '</td>';
                        echo '<td><img src="' . $row['image'] . '" alt="Image du jeu" style="max-width: 100px; max-height: 100px;"></td>';
                        echo '<td><a href="delete_gameMembre.php?id=' . $row['idJeu'] . '" class="btn btn-danger">Supprimer</a></td>';
                        
                        echo '</tr>';
                        $i++;
                    }
                }else{
                    echo '<h3>Aucun jeu dans les favoris.</h3>';
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
