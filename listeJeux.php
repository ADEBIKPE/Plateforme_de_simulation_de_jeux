<?php
require_once("roleadmin.php");



$titre = "Liste Jeux";
include 'header.inc.php';
include 'menu_admin.php';

?>
<div class="content">

  <div class="container">
    <h1>Jeux</h1>
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
        if ($stmt = $mysqli->prepare("SELECT * FROM jeu")) {
          
          $stmt->execute();
          $result = $stmt->get_result();
          if ($result->num_rows > 0) { 
            echo '<thead>
          <tr>
            <th scope="row">#</th>
            <th scope="row">Nom</th>
            <th scope="row">Photo</th>
            <th scope="row">Action</th>
            <th scope="row">Action</th>
          </tr>
        </thead>';
            while ($row = $result->fetch_assoc()) {
              $idGame = $row['idJeu'];
              $chemin= $row['image'];
              echo '<tr>';
              echo '<th scope="row">' . $i . '</th>';
            /* echo '<td>' . $row['idJeu'] . '</td>';*/ // Affiche l'ID dans la colonne "ID"
              echo '<td>' . $row['nom'] . '</td>'; // Affiche le nom dans la colonne "Nom"
              echo '<td><img src="' . $row['image'] . '" alt="Image du jeu" style="max-width: 100px; max-height: 100px;"></td>'; // Affiche l'image avec une largeur et une hauteur maximales de 100 pixels
              echo '<td><a href="update_game.php?id=' . $row['idJeu'] . '" class="btn btn-primary">Modifier</a></td> ';
              echo '<td><a href="delete_game.php?id=' . $row['idJeu'] . '" class="btn btn-danger">Supprimer</a></td>';
              echo '</tr>';
              $i++;
            }
          }else{
            echo '<h3>Aucun jeu enregistré.</h3>';
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