<?php
session_start();
$titre = "Liste des jeux";
include 'header.inc.php';
include 'menu.inc.php';

?>
<div class="content">

  <div class="container">
    <h1>List des jeux</h1>



    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nom</th>
          <th scope="col">Photo</th>
        </tr>
      </thead>
      <tbody>

        <?php

        // Connexion :
        require_once("connpdo.php");
        $req = "SELECT * FROM jeux";
        $ps = $pdo->prepare($req);
        $ps->execute();



        while ($row = $ps->fetch()) {
          echo '<tr>';
          echo '<th scope="row">' . $row['ID'] . '</th>';
          echo '<td>' . $row['NOM'] . '</td>';
          echo '<td><img src="images/' . $row['FILE'] . '" width="100px" height="100px" alt="' . $row['NOM'] . '"></td>';
          echo '</tr>';

        }


        ?>

      </tbody>

    </table>


  </div>
</div>
<?php
include 'footer.inc.php';
?>