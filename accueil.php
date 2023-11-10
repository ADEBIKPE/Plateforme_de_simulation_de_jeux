<?php
session_start();
if (!isset($_SESSION['PROFILE'])) {
    $_SESSION['erreur'] = "Vous devez être connecté";
    header('Location: index.php');
}
$login = $_SESSION['PROFILE']['email'];
$titre = "Chez " . $login;
include 'header.inc.php';
include 'menu_membre.php';
?>
<div class="content">
    <div class="container">
        
        <?php
        if (isset($_SESSION['PROFILE']['role'])) {
            $role = $_SESSION['PROFILE']['role'];

            if ($role == 1) {
                // Vous êtes administrateur, vous pouvez afficher le nom de l'administrateur ici
                if (isset($_SESSION['PROFILE']['id'])) {
                    $adminId = $_SESSION['PROFILE']['id'];

                    require_once("param.inc.php");
                    $mysqli = new mysqli($host, $login, $passwd, $dbname);
                    if ($mysqli->connect_error) {
                        die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
                    }

                    $query = "SELECT nom FROM user WHERE idUser = $adminId";
                    $result = $mysqli->query($query);

                    if ($result->num_rows > 0) {
                        $admin = $result->fetch_assoc();
                        echo "Vous êtes administrateur, " . $admin['nom'];
                    } else {
                        echo "Nom non trouvé pour cet administrateur.";
                    }
                } else {
                    echo "ID de l'administrateur non défini dans la session.";
                }
            } elseif ($role == 2) {
                if (isset($_SESSION['PROFILE']['idUser'])) {
                    // Vous êtes membre, vous pouvez afficher le nom du membre ici
                    $membreId = $_SESSION['PROFILE']['idUser'];

                    require_once("param.inc.php");
                    $mysqli = new mysqli($host, $login, $passwd, $dbname);
                    if ($mysqli->connect_error) {
                        die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
                    }

                    $query = "SELECT nom_de_avatar FROM user WHERE idUser = $membreId";
                    $result = $mysqli->query($query);

                    if ($result->num_rows > 0) {
                        $membre = $result->fetch_assoc();
                        echo '<span class="bold-text">BIENVENU(E) <span class="bold-text-small">' . $membre['nom_de_avatar'] . '</span></span>';
                    } else {
                        echo "Nom non trouvé pour cet utilisateur.";
                    }
                } else {
                    echo "ID du membre non défini dans la session.";
                }
            }
        } else {
            echo "Rôle non défini pour cet utilisateur.";
        }
        ?>
    </div>
</div>
<?php
include 'footer.inc.php';
?>