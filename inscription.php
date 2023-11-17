<?php
session_start();
//Récupération et test du paramètre
if (isset($_GET['role']) && ctype_digit($_GET['role']))
   {
    $rol = $_GET['role'];
   }
$titre = "Inscription";
include 'header.inc.php';
if( $rol==2)
    include 'menu_visiteur.php';
else 
    include 'menu_admin.php';
?>
<div class="content">
    <div class="container">
        <h1>Inscription</h1>
        <form method="POST" action="tt_inscription.php?role=<?php echo $rol; ?>">
            <div class="container">
                <div class="row my-3">
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control rounded-pill shadow" id="nom" name="nom"
                            placeholder="Nom..." required>
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control rounded-pill shadow" id="prenom" name="prenom"
                            placeholder="Prénom..." required>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control rounded-pill shadow" id="email" name="email"
                            placeholder="Email..." required>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control rounded-pill shadow" id="password" name="password"
                            placeholder="Mot de passe..." required>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <label for="dateNaissance" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control rounded-pill shadow" id="dateNaissance"
                            name="dateNaissance" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nomAvatar" class="form-label">Avatar</label>
                        <input type="text" class="form-control rounded-pill shadow" id="nomAvatar" name="nomAvatar"
                            placeholder="Avatar..." required>
                    </div>
                </div>



                <div class="row my-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <?php 
                            if($rol==1) echo '<button class="btn custom-button" style=" background-color:  #333; color: white;" type="submit">Inscrire</button>';
                            else if($rol== 2) echo '<button class="btn custom-button" style=" background-color:  #333; color: white;" type="submit">S\'inscrire</button>';
                        ?>
                        
                        
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
<?php
include 'footer.inc.php';
?>