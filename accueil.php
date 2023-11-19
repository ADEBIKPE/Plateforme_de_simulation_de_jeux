<?php
session_start();
if (!isset($_SESSION['PROFILE'])) {
    $_SESSION['erreur'] = "Vous devez être connecté";
    header('Location: index.php');
}
$login = $_SESSION['PROFILE']['email'];
$titre = "Accueil " ;
include 'header.inc.php';
include 'menu_membre.php';
?>
<div class="content" id="accueil">
    <div class="container" id="container_membre">

        <?php

        //afficher le message venant lors de l'appel de cette page s'il y en a
        if (isset($_SESSION['message'])) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
            echo $_SESSION['message'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['message']);
        }
        
        if (isset($_SESSION['PROFILE']['role'])) {
            $role = $_SESSION['PROFILE']['role'];

            
             if ($role == 2) {
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


    <!-- Carousel-->

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
            echo '<input type="hidden" name="idUser" value="' . $idUser. '">';
            echo '<input type="hidden" name="idJeu" value="' . $row['idJeu'] . '">';
            echo '<button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>';
            echo '</form>';
            echo '<button class="btn btn-secondary"  onclick="window.location.href=\'details.php?id='.$row['idJeu'].'\'" type="submit">Détails</button>';
            
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
      
      <tbody>

        <?php

        // Connexion :
        require_once("param.inc.php");
        $mysqli = new mysqli($host, $login, $passwd, $dbname);
        if ($mysqli->connect_error) {
          die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
        }


      
          //On fait une requête pour récupérer la partie, le nom du jeu, ainsi que le nombre d'inscriptions à cette partie
        if ($stmt = $mysqli->prepare("SELECT partie.*, jeu.nom AS nomJeu,
            COUNT(inscription.idPartie) AS nombreInscrits
            FROM partie
            INNER JOIN jeu ON partie.idJeu = jeu.idJeu
            LEFT JOIN inscription ON partie.idPartie = inscription.idPartie
            GROUP BY partie.idPartie")) {
          
          $stmt->execute();
          $result = $stmt->get_result();
          if ($result->num_rows > 0) { 



                
            echo '<thead>
            <tr>
                
                <th scope="row">Jeu</th>
                <th scope="row">Date</th>
                <th scope="row">Heure</th>
                <th scope="row">Durée</th>
                <th scope="row">Nombre Inscrits</th>
                <th scope="row">Action</th>
            </tr>
            </thead>';
                while ($row = $result->fetch_assoc()) {

                        
                    
                  
                    $date = $row['date_partie'];
                    $heure= $row['heure'];
                    echo '<tr>';
                   
                    //echo '<td>' . $row['idPartie'] . '</td>'; // Affiche l'ID dans la colonne "ID"
                    echo '<td>' . $row['nomJeu']. '</td>'; // Affiche le nom dans la colonne "Nom"
                    echo '<td>' . $date. '</td>';
                    echo '<td>' . $heure. '</td>';
                    echo '<td>' . $row['duree']. '</td>';
                    echo '<td>' . $row['nombreInscrits']. '</td>';
                    echo '<td><a href="tt_inscriptionMembre.php?id=' . $row['idPartie'] . '" class="btn btn-success">S\'inscrire</a></td>';
                    echo '</tr>';
                    $i++;
            }
          }else{
            echo '<h3>Aucune partie enregistrée.</h3>';
          }
        }
        

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