<?php
session_start();
$titre = "Accueil";
include 'header.inc.php';
include 'menu.inc.php';


?>

<div class="content">



    <div class="container">


        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
            echo $_SESSION['message'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['message']);
        }
        /*
        if(isset($_SESSION['erreur'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo $_SESSION['erreur'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['erreur']);
        }*/
        ?>
        <h1>Accueil</h1>
        <div class="welcome-content">
          <h2 id="welcome">WELCOME <br> GAMER(S)</h2>
          <p id="welcome-paragraph">Bienvenue sur notre site consacré aux jeux de plateau,
             un lieu dédié aux amateurs de jeux de société et de stratégie. 
             Ici, nous vous convions à découvrir un univers où l'ingéniosité se marie
              harmonieusement à la compétence pour offrir des moments
               de divertissement mémorables.
                Que vous soyez un débutant curieux d'explorer de nouveaux horizons ludiques ou
                 un expert en quête de nouveaux défis, notre vaste collection de jeux de plateau saura satisfaire tous les appétits ludiques. 
                 Rejoignez une communauté passionnée, partagez des aventures épiques avec vos amis et mettez vos facultés de réflexion à l'épreuve grâce à notre sélection captivante de jeux. 
                 L'aventure vous attend !

          </p>
        </div>

    </div>

    <!-- Le contenu de la page ici -->
</div>
<?php
include 'footer.inc.php';
?>