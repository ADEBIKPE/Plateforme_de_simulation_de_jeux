<?php
//require_once("roleadmin.php");
session_start();
$titre = "Administratuer";
include 'header.inc.php';
include 'menu_admin.php';
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
        ?>

        <h1>Administrateur</h1>
        <?php
        if (isset($_SESSION['PROFILE']) && $_SESSION['PROFILE']['role'] == 1) {
            echo '<a href="jeux.php" class="btn btn-primary">Ajouter un jeu</a>';
        }
        ?>
    </div>
</div>
<?php
include 'footer.inc.php';
?>