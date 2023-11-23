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

    <?php
    // Connexion :
    require_once("param.inc.php");
    $mysqli = new mysqli($host, $login, $passwd, $dbname);
    if ($mysqli->connect_error) {
      die('Erreur de connexion (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
    }

    $i = 1;

    // On fait une requête pour récupérer la partie, le nom du jeu
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
    ?>

    <div class="row">
      <?php
      while ($row = $result->fetch_assoc()) {
        $nombreInscrits = 2;
        $date = $row['date_partie'];
        $heure = $row['heure'];
      ?>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title" style="font-weight:bold;font-style:italic;"><?php echo $row['nomJeu']; ?></h5>
          </div>
          <div class="card-body">
            <p class="card-text">Date: <?php echo $row['date_partie']; ?></p>
            <p class="card-text">Heure: <?php echo $row['heure']; ?></p>
            <p class="card-text">
              Statut:
              <?php
                if($row['statut_inscription'] == 0)
                  echo '<span style="color: blue;">En cours de validation</span>';
                elseif($row['statut_inscription'] == 1)
                  echo '<span style="color: green;">Acceptée</span>';
                else
                  echo '<span style="color: red;">Refusée</span>';
              ?>
            </p>
          </div>
        </div>
      </div>
      <?php
          $i++;
        }
      } else {
        echo '<h3>Aucune inscription</h3>';
      }
    }
      ?>
    </div>
  </div>
</div>
<?php
include 'footer.inc.php';
?>