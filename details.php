<?php 
session_start();
if(!(isset($_SESSION['PROFILE']) ))
  header("location:connexion.php");

$titre="Détails des Jeux";
include("header.inc.php");

$role=$_SESSION['PROFILE']['role'];

if($role==2)
  include("menu_membre.php");
else
{
  include("menu_admin.php");
}
  
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
  $id = $_GET['id'];
}

?>  
<div class="container mt-5">
  <?php 
  // Connexion :
  require_once("param.inc.php");
  $mysqli = new mysqli($host, $login, $passwd, $dbname);
  if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
  }

  if ($stmt = $mysqli->prepare("SELECT * FROM jeu WHERE idJeu=?")) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) { 
      while ($row = $result->fetch_assoc()) {
        $description=html_entity_decode($row['description']);
        ?>
        <div class="card mb-3">
          <div class="card-header">
            <h1 class="card-title"><?php echo $row['nom']; ?></h1>
          </div>
          <div class="row g-0">
            <div class="col-lg-6" style="padding:25px;">
              <img src="<?php echo $row['image']; ?>" alt="Image du jeu" class="img-fluid" style="object-fit: cover;">
            </div>
            <div class="col-lg-5 des">
              <div class="card-body">
                <p class="card-text"><?php echo $description; ?></p>
                <a class="btn btn-primary" href="<?php echo $row['regle']; ?>">Règles</a>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    } else {
      echo '<h3>Impossible de charger les détails de ce jeu</h3>';
    }
  }
  ?>
  
  <!-- Section pour les parties à venir -->
  <div class="encadrer-contenu" style="border: 10px solid black; padding: 10px; margin: 10px;">
    <div class="section_P">
      <?php
      if ($stmt = $mysqli->prepare("SELECT partie.*, jeu.nom AS nomJeu, COUNT(inscription.idPartie) AS nombreInscrits
      FROM partie
      INNER JOIN jeu ON partie.idJeu = jeu.idJeu
      LEFT JOIN inscription ON partie.idPartie = inscription.idPartie
      WHERE partie.idJeu = ?
      GROUP BY partie.idPartie;")) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          ?>
          <h2 class="card-title" style="font-family: 'Bodoni MTsplay',serif; font-size: 40px; font-weight:bold; font-style:italic;">Prochaines parties de ce jeu</h2>
          <div></br></div>
          <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            while ($row = $result->fetch_assoc()) {
              $date = $row['date_partie'];
              $heure= $row['heure'];
              ?>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $date; ?></h5>
                    <p class="card-text"><?php echo $heure; ?></p>
                    <p class="card-text"><?php echo $row['duree']; ?></p>
                    <p class="card-text">Nombre Inscrits: <?php echo $row['nombreInscrits']; ?></p>
                    <a href="tt_inscriptionMembre.php?id=<?php echo $row['idPartie']; ?>" class="btn btn-success">S'inscrire</a>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
          </div>
          <?php
        } else {
          echo '<h3>Aucune partie à venir pour ce jeu.</h3>';
        }
      }
      ?>
    </div>
  </div>
</div>