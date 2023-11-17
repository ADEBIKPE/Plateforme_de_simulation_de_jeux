<!DOCTYPE html>
<html>
  <?php
  include("header.inc.php")
  ?>
  <body class="menu_de_navigation">
    <nav class="navbar navbar-expand-lg " >
      <div class="container-fluid">
        <a class="navbar-brand" href="#">PGA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active lien" aria-current="page" aria-expanded="false" href="admin.php">Accueil</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle lien" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ajouter
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item lien" href="inscription.php?role=1">Administrateur</a></li>
                <li><hr class="dropdown-divider lien"></li>
                <li><a class="dropdown-item lien" href="jeux.php">Jeu</a></li>
                <li><hr class="dropdown-divider lien"></li>
                <li><a class="dropdown-item lien" href="partie.php">Partie</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active lien" href="listeMembres.php" aria-disabled="false">Membres</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active lien" href="listeJeux.php" aria-disabled="false">Jeux</a>
            </li>  
            <li class="nav-item">
              <a class="nav-link active lien" href="listePartie.php" aria-disabled="false">Parties</a>
            </li>  
          </ul>
          
            <button class="btn deco" onclick="window.location.href='logout.php'" type="submit">Déconnexion</button>
        
        </div>
      </div>
    </nav>
  </body>
</html>
