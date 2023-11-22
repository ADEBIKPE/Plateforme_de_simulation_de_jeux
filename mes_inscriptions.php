<?php

require_once('roleMembre.php');

$titre = "Mes inscriptions";
include 'header.inc.php';
include 'menu_membre.php';

if(!isset($_SESSION['PROFILE']['idUser']))
  header('Location:index.php');


$idUser=$_SESSION['PROFILE']['idUser'];
?>
<div class="content">

  <div class="container">
    <h2>Mes inscriptions</h2>
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

        //On fait une requête pour récupérer la partie, le nom du jeu
        if ($stmt = $mysqli->prepare("SELECT inscription.*,
        jeu.nom AS nomJeu, partie.date_partie AS date_partie, partie.heure AS heure
        FROM inscription 
        INNER JOIN user ON inscription.idUser = user.idUser
        LEFT JOIN partie ON inscription.idPartie = partie.idPartie
        LEFT JOIN jeu ON partie.idJeu = jeu.idJeu
        WHERE inscription.idUser=$idUser
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
                    <th scope="row">Statut</th>
                   
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
                        if($row['statut_inscription']==0)
                            echo '<td style="color:blue;">En cours</td>';
                        elseif($row['statut_inscription']==1)
                            echo '<td style="color:green;">Acceptée</td>';
                        else
                            echo '<td style="color:red;">Refusée</td>';

                        echo ' 
                                
                               
                               
                        </tr>';
                        $i++;
                
            }
          }else{
            echo '<h3>Aucune inscription</h3>';
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