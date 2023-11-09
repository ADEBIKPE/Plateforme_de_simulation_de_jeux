<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <link rel="stylesheet" href="style_menus.css">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='main.js'></script>
</head>
<body>
<nav class="navbar navbar-expand-lg " >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PGA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active lien" aria-current="page" aria-expanded="false" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active lien" href="list.php" aria-disabled="false">Mes Jeux</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active lien" href="listeJeux.php" aria-disabled="false">Historique</a>
        </li>  
      </ul>
      
      
      <form class="d-flex" role="search">
        <button class="btn deco" type="submit">Déconnexion</button>
      </form>
    </div>
  </div>
</nav>
</body>
</html>
