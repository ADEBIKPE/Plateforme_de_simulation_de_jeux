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
<div class="content" id="accueil">
    <div class="container" id="container_membre">

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

    <div id="imageCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/Poker1.jpg" class="d-block w-100" alt="Image 1">
                            
                            
                        </div>
                        <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                    </div>
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/monopoly.jpg" class="d-block w-100" alt="Image 2">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/Echecs.jpg" class="d-block w-100" alt="Image 3">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/Shogi.jpg" class="d-block w-100" alt="Image 4">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/Scrabble.jpg" class="d-block w-100" alt="Image 5">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/Uno.jpg" class="d-block w-100" alt="Image 6">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/Cluedo.jpg" class="d-block w-100" alt="Image 7">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/CodeNames.jpg" class="d-block w-100" alt="Image 8">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/ScotlandYard.jpg" class="d-block w-100" alt="Image 9">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/Rummikub.jpg" class="d-block w-100" alt="Image 10">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/Pacman.jpg" class="d-block w-100" alt="Image 11">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 custom-slide">
                        <div class="image-container">
                            <img src="images/imagesJeu/mancala.jpg" class="d-block w-100" alt="Image 12">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Flèche de contrôle gauche -->
        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Flèche de contrôle droite -->
        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
    <!-- Section pour les parties à venir -->
    <div class="section_P">
        <h2>Prochaines Parties</h2>
        <div class="flex-container">
            <!-- Ajoutez ici les informations sur les parties à venir -->
            <div class="section_1">
                <h3 class="party-title">Nom de la partie 1</h3>
                <p>Date : 01/01/2023</p>
                <p>Heure : 18h00</p>
            </div>
            <div class="section_2">
                <h3 class="party-title">Nom de la partie 2</h3>
                <p>Date : 02/01/2023</p>
                <p>Heure : 20h00</p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>


<?php
include 'footer.inc.php';
?>