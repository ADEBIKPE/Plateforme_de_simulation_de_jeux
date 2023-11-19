<?php 
session_start();
$titre="Détails des Jeux";
include("header.inc.php");
include("menu_membre.php");


    if (isset($_GET['id']) && ctype_digit($_GET['id']))
   {
    $id = $_GET['id'];
   }

?>  
<div class=" container mt-5 ">
   

            <?php 
            // Connexion :
            require_once("param.inc.php");
            $mysqli = new mysqli($host, $login, $passwd, $dbname);
            if ($mysqli->connect_error) {
                die('Erreur de connexion (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
            }


           
            if ($stmt = $mysqli->prepare("SELECT * FROM jeu WHERE idJeu=?")) {

                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) { 
                    
                
                    while ($row = $result->fetch_assoc()) {
                        //$titre=$row['nom'];
                        $description=html_entity_decode($row['description']);
                        echo '<p style ="font-size:50px;font-weight:bold;">' . $row['nom'] . '</p>';
                        echo '<div class="row " id="detail">';
                        echo '<div class=" col-lg-1">';
                        echo '</div>';
                        echo '<div class=" col-lg-6">
                                <img src="' . $row['image'] . '" alt="Image du jeu" style="height: 400px;  object-fit: cover;">
                            </div>';
                        echo '<div class=" col-lg-5 des" >';
                        echo '<p>' . $description . '</p>';
                        echo '<a style ="font-size:25px;" class="des" href="'.$row['regle'].'">Règles</a>';
                        echo '</div>'; 
                        echo '</div>';
                      
                        
                    }
                }else{
                echo '<h3>Impossible de charger les détails de ce jeu</h3>';
                }
            }
            
            ?>
    


    
    <!-- Section pour les parties à venir -->
    <div class="section_P">
       

        <?php

        // Connexion :
        require_once("param.inc.php");
        $mysqli = new mysqli($host, $login, $passwd, $dbname);
        if ($mysqli->connect_error) {
          die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
        }


      
          //On fait une requête pour récupérer la partie, le nom du jeu, ainsi que le nombre d'inscriptions à cette partie
        if ($stmt = $mysqli->prepare("SELECT partie.*, jeu.nom AS nomJeu,COUNT(inscription.idPartie) AS nombreInscrits
        FROM partie
        INNER JOIN jeu ON partie.idJeu = jeu.idJeu
        LEFT JOIN inscription ON partie.idPartie = inscription.idPartie
        WHERE partie.idJeu = ?
        GROUP BY partie.idPartie;")) {
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $result = $stmt->get_result();
          if ($result->num_rows > 0) { 

            echo '<h2>Prochaines parties de ce jeu</h2>

            <table class="table table-bg">
      
            <tbody>';


                
            echo '<thead>
            <tr>
                
                
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
                   
                    echo '<td>' . $date. '</td>';
                    echo '<td>' . $heure. '</td>';
                    echo '<td>' . $row['duree']. '</td>';
                    echo '<td>' . $row['nombreInscrits']. '</td>';
                    echo '<td><a href="tt_inscriptionMembre.php?id=' . $row['idPartie'] . '" class="btn btn-success">S\'inscrire</a></td>';
                    echo '</tr>';
                   
            }
          }else{
            echo '<h3>Aucune partie enregistrée.</h3>';
          }
        }
        echo '</tbody>

        </table>'

        ?>

      
    
    
            

    </div>
</div>