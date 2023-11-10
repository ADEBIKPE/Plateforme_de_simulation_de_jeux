<?php
//require_once("roleadmin.php");



$titre = "Liste Utilisateur";
include 'header.inc.php';
include 'menu_admin.php';

?>
<div class="content">

  <div class="container">
    <h1>Contenu</h1>


    

    <table class="table table-bg">
      <thead>
        <tr>
          <th scope="row">ID</th>
          <th scope="row">Nom</th>
          <th scope="row">Photo</th>
        </tr>
      </thead>
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
          while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<th scope="row">' . $i . '</th>';
           /* echo '<td>' . $row['idJeu'] . '</td>';*/ // Affiche l'ID dans la colonne "ID"
            echo '<td>' . $row['nom'] . '</td>'; // Affiche le nom dans la colonne "Nom"
            echo '<td><img src="' . $row['image'] . '" alt="Image du jeu" style="max-width: 100px; max-height: 100px;"></td>'; // Affiche l'image avec une largeur et une hauteur maximales de 100 pixels
            echo '</tr>';
            $i++;
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