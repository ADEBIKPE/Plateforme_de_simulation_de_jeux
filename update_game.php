<?php
require_once("roleadmin.php");
$id=$_GET['id'];
$titre = "Modifier Jeux";
include 'header.inc.php';
include 'menu_admin.php';
?>
<div class="content">

    <div class="container">
        <h1>Modifier un Jeu </h1>
        <form method="POST" action="tt_update_game.php?id=" enctype="multipart/form-data">
            <div class="container">
                <div class="row my-3">


                    <div class="col-md-4">
                        <label for="nomjeux" class="form-label">Nom de jeu</label>
                        <input type="text" class="form-control " id="nomjeux" name="nomjeux"
                            placeholder="Nom du jeux..." required>
                    </div>
                    <div class="col-md-4">
                        <label for="Categorie" class="form-label">Catégorie</label>
                        <input type="text" class="form-control " id="categorie" name="categorie"
                            placeholder="Categorie..." required>
                    </div>
                    <div class="col-md-4">
                        <label for="Description" class="form-label">Description</label>
                        <input type="text" class="form-control " id="description" name="description"
                            placeholder="Description..." required>
                    </div>

                </div>
                <div class="row my-3">
                    <div class="col-md-4">
                        <label class="form-label">Ajout d'une image</label>
                        <input type="file" name="image" class="form-control" />

                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ajout des règles (PDF) </label>
                        <input type="file" name="regles" class="form-control" />

                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button class="btn custom-button" style=" background-color:  #333; color: white;" type="submit">Modifier</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include 'footer.inc.php';
?>