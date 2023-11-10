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
            <div class="container">
                <div class="row my-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control rounded-pill shadow" id="email" name="email"
                                placeholder="Votre email..." required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control rounded-pill shadow" id="password"
                                name="password" placeholder="Votre mot de passe..." required>
                        </div>
                    </div>
                    <div class="row my-3">
                        
                        <div class="col-md-12 d-flex justify-content-end align-items-baseline">
                            <a href="#" class="forgot-password-link">Mot de passe oublié </a>
                            <button class="btn custom-button ms-3" type="submit">Connexion</button>
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>
<?php
include 'footer.inc.php';
?>