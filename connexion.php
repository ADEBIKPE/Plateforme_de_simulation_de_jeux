<?php
session_start();
    $titre = "Connexion";
    include 'header.inc.php';
    include 'menu.inc.php';
?>
<div class="container">
<h1>Connexion</h1>
<?php
    if(isset($_SESSION['message'])) {
        if($_SESSION['message']=="Erreur de connexion")
        {echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        }else{echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';}
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        unset($_SESSION['message']);
    }
    ?>
<form  method="POST" action="tt_connexion.php">
    <div class="container">
    <div class="row my-3">
        <div class="row">
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control " id="email" name="email" placeholder="Votre email..." required>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control " id="password" name="password" placeholder="Votre mot de passe..." required>
        </div>
        </div>
        <div class="row my-3">
        <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" type="submit">Connexion</button></div>   
        </div>
    </div>
</form>
</div>
<?php
    include 'footer.inc.php';
?>