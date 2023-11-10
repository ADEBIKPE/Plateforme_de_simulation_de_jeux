<?php
session_start();
$titre = "Inscription";
include 'header.inc.php';
include 'menu.inc.php';
?>
<div class="content">
    <div class="container">
        <h1>Inscription</h1>
        <form method="POST" action="tt_inscription.php">
            <div class="container">
                <div class="row my-3">
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control rounded-pill shadow" id="nom" name="nom"
                            placeholder="Votre nom..." required>
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control rounded-pill shadow" id="prenom" name="prenom"
                            placeholder="Votre prénom..." required>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control rounded-pill shadow" id="email" name="email"
                            placeholder="Votre email..." required>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control rounded-pill shadow" id="password" name="password"
                            placeholder="Votre mot de passe..." required>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <label for="dateNaissance" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control rounded-pill shadow" id="dateNaissance"
                            name="dateNaissance" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nomAvatar" class="form-label">Nom de votre avatar</label>
                        <input type="text" class="form-control rounded-pill shadow" id="nomAvatar" name="nomAvatar"
                            placeholder="Nom de votre avatar..." required>
                    </div>
                </div>



                <div class="row my-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button class="btn custom-button" type="submit">S'inscrire</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
<?php
include 'footer.inc.php';
?>