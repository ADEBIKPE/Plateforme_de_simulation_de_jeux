<!DOCTYPE html>
<html>
    <?php
    session_start();
    $titre = "Accueil";
    include 'header.inc.php';
    include 'menu_visiteur.php';

    ?>
    <body id="inde">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-4">
                        <!--  carrousel -->
                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="export_image.php?id=7" style="height: 400px;  object-fit: cover;"  alt="Image 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="export_image.php?id=1" style="height: 400px; object-fit: cover;" alt="Image 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="export_image.php?id=2" style="height: 400px; object-fit: cover;" class="d-block w-100" alt="Image 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="export_image.php?id=3" style="height: 400px; object-fit: cover;" class="d-block w-100" alt="Image 4">
                                </div>
                                <!--<button class="btn deco" onclick="window.location.href='export_pdf.php?id=8'">Test affichage règles</button>-->
                            </div>
                        </div>
                    </div>

                    <!-- Ajout d'autres colonnes -->
                    <div class="col-lg-2">
                        
                    </div>
                    <div class="col-lg-6">
                        <p class="ta">Bienvenue sur <span style="color: coral;">Plateau Game Arena</span> !<br><br></p>
                       <div class="ba">La plateforme en ligne de <span style="color: coral;">jeux de plateau</span>.<br><br></div>

                       <button class="btn mon_bouton "  style=" background-color:coral; color: white;" onclick="window.location.href='connexion.php'" type="submit" ><div class="ca">Commencez à jouer maintenant</div></button>
                    </div>
                    
                </div>
                <div>
                    <div class="col-lg-1"></br></br></br></br></div>
                    <div class="row" id="bas_inde">
                           
                            <div class="col-lg-6">
                                <p class="ta">De super jeux rien que pour vous!<br><br></p>
                                <div class="ba"> <span style="color: coral;">  Débutant ou Pro?</span><br><br></div>
                                <div class= "ta" >Affrontez des joueurs du monde entier et bâtissez votre réputation.<br><br></div>   
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5" style="background-color:#333; border-radius:25px; color:white;">
                                <p class="ta">Comment ça marche?<br><br></p>
                                <div class="ba" style="font-size:25px;">1- Inscrivez-vous ou connectez-vous</br>2-Découvrez les jeux</br>
                                3-Ajouter des jeux à vos favoris</br>4-Inscrivez-vous à des parties</br>5-Bataillez</span><br><br></div>
                            </div>
                    </div>
                </div>


               
                </div>
            </div>
        <?php
        //include 'footer.inc.php';
        ?>
    </body>
</html>