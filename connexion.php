<?php
session_start();
 $titre = "Connexion";
include 'header.inc.php';
include 'menu_visiteur.php';
?>

<div class="content">
    <div class="container">
        <h1>Connexion</h1>
        <?php
        if (isset($_SESSION['message'])) {
            if ($_SESSION['message'] == "Erreur de connexion") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            } else {
                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
            }
            echo $_SESSION['message'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['message']);
        }
        ?>
        <form method="POST" action="tt_connexion.php">
            <div class="mb-3 col-lg-5">
                <label for="exampleInputEmail1" class="form-label">Adresse mail</label>
                <input name = "email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3 col-lg-5">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input name =" password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
           
            <button class="btn custom-button"  style=" background-color:  #333; color: white;" type="submit" >Connexion</button>
        </form>
        <div class="row my-3">
                        
                        <div class="col-md-4 ">
                            <p >Vous n'avez pas encore de compte? <a href="inscription.php?role=2" class="mb-3 forgot-password-link">Inscrivez-vous</a> </p>
                           
                        </div>
                    </div>

    </div>
</div>
<?php
include 'footer.inc.php';
?>