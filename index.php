<!DOCTYPE html>
<html>
    <?php
    session_start();
    $titre = "Accueil";
    include 'header.inc.php';
    include 'menu_visiteur.php';

    ?>
    <body id= "inde">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Votre carrousel ici -->
                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/Azul.jpg" style="height: 450px; object-fit: cover;" class="d-block w-100" alt="Image 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="" style="height: 450px; object-fit: cover;" class="d-block w-100" alt="Image 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="" style="height: 450px; object-fit: cover;" class="d-block w-100" alt="Image 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="" style="height: 450px; object-fit: cover;" class="d-block w-100" alt="Image 4">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                    <div class="col-lg-2">
                        
                    </div>
                    <div class="col-lg-6">
                        <p  class= "ta" >Bienvenue sur <span style="color: coral;">Plateau Game Arena</span> !<br><br>
                       </p>
                       <div class= "ba" >La plateforme en ligne de <span style="color: coral;">jeux de plateau</span>.<br><br></div>

                       <button class="btn mon_bouton "  style=" background-color:coral; color: white;" onclick="window.location.href='connexion.php'" type="submit" ><div class="ca">Commencez à jouer maintenant</div></button>
                    </div>
                    
                </div>
            </div>
        <?php
        //include 'footer.inc.php';
        ?>
    </body>
</html>