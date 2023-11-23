<?php
require_once("roleadmin.php");

$titre = "Liste Utilisateur";
include 'header.inc.php';
include 'menu_admin.php';
?>
<div class="content" style="background-color:#333;color:white;padding:25px;">
    <div class="container">
        <h2 style="font-family: 'Bodoni MTsplay',serif; font-size: 40px; font-weight:bold; font-style:italic;">Utilisateurs</h2>
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
        if ($stmt = $mysqli->prepare("SELECT * FROM user WHERE 1")) {

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold;"><?php echo $row['nom'].' '.$row['prenom'] ?></h5>
                            
                            <p class="card-text">Email: <?php echo $row['email']; ?></p>
                            <p class="card-text">Rôle: <?php echo ($row['role'] == 1) ? 'Administrateur' : 'Utilisateur'; ?></p>
                            <a href="delete.php?email=<?php echo $row['email']; ?>" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></a>
                        </div>
                    </div>
        <?php
                    $i++;
                }
            } else {
                echo '<h1>Aucun membre enregistré</h1>';
            }
        }
        ?>
    </div>
</div>
<?php
include 'footer.inc.php';
?>