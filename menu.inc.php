<nav class="navbar navbar-expand-md bg-clor border-bottom border-body">
  <div class="container-fluid">
    <h1 class="navbar-brand" href="#">ESIG' GAME</h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link" href="page.php">Une page</a> -->
        </li>

        <?php

        if ((isset($_SESSION['PROFILE']))) {
          $nom = $_SESSION['PROFILE']['nom'];
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="chez.php">Chez ' . $nom . '</a>';
          echo '</li>';
        }
        ?>


      </ul>

      <?php
      if (!(isset($_SESSION['PROFILE']))) {


        echo ' <ul class="navbar-nav mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="inscription.php">Sign in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="connexion.php">Sign up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="infos.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="infos.php">Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="infos.php">Help</a>
        </li>

      </ul>';
      } else {

        echo ' <ul class="navbar-nav mb-lg-0">
       <li class="nav-item">
         <a class="nav-link" href="logout.php">Logout</a>
       </li>

     </ul>';

      }


      ?>
    </div>
  </div>
</nav>