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
        if ($stmt = $mysqli->prepare("SELECT * FROM partie")) {
          
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

                      $idGame= $row['idJeu'];

                        //Récupérer le nom du jeu associer à la partie
                        $nomJeu="Chancel";
                        if($stmt2= $mysqli->prepare("SELECT nom FROM jeu WHERE idJeu=?")){
                           // Liaison des paramètres
                            $stmt2->bind_param("i", $idGame);

                            // Exécution de la requête
                            $stmt2->execute();

                            // Récupération des résultats
                            $resultat = $stmt2->get_result();

                            // Vérification s'il y a des résultats
                            if ($resultat->num_rows > 0) {
                                // Récupération des données dans une variable
                                $rowNomJeu = $resultat->fetch_assoc();
                                $nomJeu = $rowNomJeu['nom']; //
                            }
                            $stmt2->close();

                        }
                        else
                        {
                          $nomJeu='Indisponible';
                          echo $nomJeu;
                          echo "Etienne";
                          $stmt2->close();
                        }
                            
                        
                        $nombreInscrits=2;
                        $date = $row['date_partie'];
                        $heure= $row['heure'];
                        echo '<tr>';
                        echo '<th scope="row">' . $i . '</th>';
                        /* echo '<td>' . $row['idJeu'] . '</td>';*/ // Affiche l'ID dans la colonne "ID"
                        echo '<td>' . $nomJeu. '</td>'; // Affiche le nom dans la colonne "Nom"
                        echo '<td>' . $date. '</td>';
                        echo '<td>' . $heure. '</td>';
                        echo '<td>' . $row['nb_max_necessaire']. '</td>';
                        echo '<td>' . $nombreInscrits. '</td>';
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