<?php
require_once("roleadmin.php");    



$titre = "Création Parties";
include 'header.inc.php';
include 'menu_admin.php';

?>
<div class="container">
    <h1>Partie</h1>
    <div id="partie">

        

        <form action="tt_partie.php" method="POST">
            <!-- Champs de formulaire -->
            <label for="date_partie">Date de la partie:</label>
            <input type="date" id="date_partie" name="date_partie" required><br>

            <label for="heure">Heure de la partie:</label>
            <input type="time" id="heure" name="heure" required><br>

            <label for="duree">Durée de la partie:</label>
            <input type="text" id="duree" name="duree" required><br>

            <label for="nb_max_necessaire">Nombre maximal nécessaire:</label>
            <input type="text" id="nb_max_necessaire" name="nb_max_necessaire" required><br>

            <!-- Liste déroulante pour l'id du jeu -->
            <label for="idJeu">Jeu:</label>
            <select id="idJeu" name="idJeu" style='max-height: 200px' class="largeDropdown" required>
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
                        if ($result->num_rows > 0) { 
                            
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["idJeu"] . "'>" . $row["nom"] . "</option>";
                                echo $row["nomJeu"];
                            }
                        }else
                        echo "Chancel";
                    }


                ?>
            </select><br>

            <!-- Bouton de soumission -->
            <input type="submit" style=" background-color:  #333; color: white;" value="Créer">
        </form>

     </div>
</div>
