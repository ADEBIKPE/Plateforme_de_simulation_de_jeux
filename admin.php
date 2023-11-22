<?php
require_once("roleadmin.php");



$titre = "Validation";
include 'header.inc.php';
include 'menu_admin.php';

?>
<div class="content">

  <div class="container">
    <h2>Inscriptions en attente de validation</h2>
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
        if ($stmt = $mysqli->prepare("SELECT inscription.*, user.nom AS nomMembre,user.prenom AS prenomMembre,user.idUser AS idUser,
        jeu.nom AS nomJeu, partie.date_partie AS date_partie, partie.heure AS heure
        FROM inscription 
        INNER JOIN user ON inscription.idUser = user.idUser
        LEFT JOIN partie ON inscription.idPartie = partie.idPartie
        LEFT JOIN jeu ON partie.idJeu = jeu.idJeu
        WHERE inscription.statut_inscription = 0
        GROUP BY inscription.id")) {
          
          $stmt->execute();
          $result = $stmt->get_result();
          if ($result->num_rows > 0) { 



                
                    echo '<thead>
                <tr>
                    <th scope="row">#</th>
                    <th scope="row">Jeu</th>
                    <th scope="row">Date</th>
                    <th scope="row">Heure</th>
                    <th scope="row">Membre</th>
                    <th scope="row">Action</th>
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
                        echo '<td>' .$row['date_partie'].  '</td>';
                        echo '<td>' . $row['heure']. '</td>';
                        echo '<td>' . $row['nomMembre']. ' '. $row['prenomMembre']. '</td>';
                        echo ' 
                                <td><a href="validation.php?valeur=1&idInscription=' . $row['id'] . '&idUser=' . $row['idUser'] . '" class="btn btn-success">Valider</a></td>
                                <td><a href="validation.php?valeur=2&idInscription=' . $row['id'] . '&idUser=' . $row['idUser'] . '" class="btn btn-danger">Refuser</a></td>
                               
                               
                        </tr>';
                        $i++;
                
            }
          }else{
            echo '<h3>Aucune inscription à valider</h3>';
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