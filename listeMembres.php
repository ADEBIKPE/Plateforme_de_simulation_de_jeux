<?php
require_once("roleadmin.php");    



$titre = "Liste Utilisateur";
include 'header.inc.php';
include 'menu_admin.php';

?>
<div class="content">

  <div class="container">
    <h1>Utilisateurs</h1>
    <div></br></div>



    <table class="table">
      
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
        if ($stmt = $mysqli->prepare("SELECT * FROM user WHERE 1")) {

          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
            echo '<thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>';
            while ($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<th scope="row">' . $i . '</th>';
              echo '<td>' . $row['nom'] . '</td>';
              echo '<td>' . $row['prenom'] . '</td>';
              echo '<td>' . $row['email'] . '</td>';
              if( $row['role']==1)
                echo '<td>Administrateur</td>';
              else
                echo '<td>Utilisateur</td>';
              echo '<td><a href="delete.php?email=' . $row['email'] . '" class="btn btn-danger">Supprimer</a></td>';
              echo '</tr>';
              $i++;
            }
          }else{
              echo '<h1>Aucun membre enregistré</h1>';
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