<?php
require_once("roleadmin.php");

$titre = "Liste Parties";
include 'header.inc.php';
include 'menu_admin.php';
?>
<div class="content" style="background-color:#333;color:white;padding:25px;">
    <div class="container"  >
        <h2 style="font-family: 'Bodoni MTsplay',serif; font-size: 40px; font-weight:bold; font-style:italic;">Parties</h1>
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

     

           // On fait une requête pour récupérer la partie, le nom du jeu, ainsi que le nombre d'inscriptions à cette partie
    if ($stmt = $mysqli->prepare("SELECT partie.*, jeu.nom AS nomJeu,
    COUNT(inscription.idPartie) AS nombreInscrits
    FROM partie
    INNER JOIN jeu ON partie.idJeu = jeu.idJeu
    LEFT JOIN inscription ON partie.idPartie = inscription.idPartie
    GROUP BY partie.idPartie")) {

    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $date = $row['date_partie'];
            $heure = $row['heure'];

            // Vérifier si l'utilisateur est déjà inscrit à cette partie
            $idPartie = $row['idPartie'];
            $idUser = $_SESSION['PROFILE']['idUser'];

           
?>

            <!--Récupération des membres inscrits à la partie-->
            <?php 
                $stmtMembre=$mysqli->prepare("SELECT nom,prenom FROM user JOIN inscription ON inscription.idUser=user.idUser
                WHERE inscription.idPartie=?");
                $stmtMembre->bind_param("i",$idPartie);
                $stmtMembre->execute();
                $resultMembre=$stmtMembre->get_result();
                $chaineMembre="";
                if($resultMembre->num_rows>0){
                    
                    while($rowMembre=$resultMembre->fetch_assoc())
                    $chaineMembre.=$rowMembre['nom'].' '.$rowMembre['prenom'].'\n';
                }

                $chaineMembre=rtrim($chaineMembre,'\n');
                $stmtMembre->close();
                ?>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title" style="font-weight:bold;font-style:italic;"><?php echo $row['nomJeu']; ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Date: <?php echo $date; ?></p>
                    <p class="card-text">Heure: <?php echo $heure; ?></p>
                    <p class="card-text">Nombre nécessaire: <?php echo $row['nb_max_necessaire']; ?></p>
                    <a onclick="afficherMembres('<?php echo $chaineMembre ?>')" class="card-text">Membres Inscrits: <?php echo $row['nombreInscrits']; ?></a>
                    <a href="delete_partie.php?id=<?php echo $row['idPartie']; ?>" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></a>
                </div>
            </div>
<?php
        }
    } else {
        echo '<h3>Aucune partie enregistrée.</h3>';
    }

    $stmt->close();
}
?>
        
    </div>
</div>
<?php
include 'footer.inc.php';
?>
<script>
    function afficherMembres(membresString) {
    // Utiliser la chaîne de caractères des membres passée depuis PHP
    alert("Membres Inscrits:\n" + membresString);
}
</script>