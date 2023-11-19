<?php
require_once("roleadmin.php");



$titre = "Liste Parties";
include 'header.inc.php';
include 'menu_admin.php';

?>
<div class="content">

  <div class="container">
    <h1>Parties</h1>
    <div></br></div>


    

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


        $i = 1;

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
                    <th scope="row">#</th>
                    <th scope="row">Jeu</th>
                    <th scope="row">Date</th>
                    <th scope="row">Heure</th>
                    <th scope="row">Nombre nécessaire</th>
                    <th scope="row">Nombre Inscrits</th>
                    <th scope="row">Action</th>
                </tr>
                </thead>';
                    while ($row = $result->fetch_assoc()) {

                            
                        
                        $nombreInscrits=2;
                        $date = $row['date_partie'];
                        $heure= $row['heure'];
                        echo '<tr>';
                        echo '<th scope="row">' . $i . '</th>';
                        /* echo '<td>' . $row['idJeu'] . '</td>';*/ // Affiche l'ID dans la colonne "ID"
                        echo '<td>' . $row['nomJeu']. '</td>'; // Affiche le nom dans la colonne "Nom"
                        echo '<td>' . $date. '</td>';
                        echo '<td>' . $heure. '</td>';
                        echo '<td>' . $row['nb_max_necessaire']. '</td>';
                        echo '<td>' .  $row['nombreInscrits']. '</td>';
                        echo '<td><a href="delete_partie.php?id=' . $row['idPartie'] . '" class="btn btn-danger">Annuler</a></td>';
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
<?php
include 'footer.inc.php';
?>