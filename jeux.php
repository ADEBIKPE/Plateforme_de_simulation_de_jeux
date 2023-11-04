<?php
session_start();
$titre = "Ajout Jeux";
include 'header.inc.php';
include 'menu.inc.php';
?>
<div class="content">

    <div class="container">
        <h1>Ajout d'un Jeux </h1>
        <form method="POST" action="tt_jeux.php" enctype="multipart/form-data">
            <div class="container">
                <div class="row my-3">


                    <div class="col-md-4">
                        <label for="nomjeux" class="form-label">Nom de jeux</label>
                        <input type="text" class="form-control " id="nomjeux" name="nomjeux"
                            placeholder="Nom du jeux..." required>
                    </div>
                    <div class="col-md-4">
                        <label for="Categorie" class="form-label">Categorie</label>
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
                    <div class="col-md-6">
                        <label class="form-label">Ajout d'une photo </label>
                        <input type="file" name="userfile" class="form-control" />

                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ajout des règles (PDF) </label>
                        <input type="file" name="userfile" class="form-control" />

                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button class="btn custom-button" type="submit">Ajouter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include 'footer.inc.php';
?>