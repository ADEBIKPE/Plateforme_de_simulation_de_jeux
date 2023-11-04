<?php
    session_start();
    if(!isset($_SESSION['PROFILE'])) {
        $_SESSION['erreur'] = "Vous devez être connecté";
        header('Location: index.php');
    }
    $login = $_SESSION['PROFILE']['email'];
    $titre = "Chez ".$login;
    include 'header.inc.php';
    include 'menu.inc.php';
?>
<div class="container">

<h1>Page de <?php echo $login; ?> </h1>

<?php
    if ($_SESSION['PROFILE']['role'] == 1) {
        echo "Vous êtes élève";
    } else {
        echo "Vous êtes enseignant PING";
    }
?>
</div>
<?php
    include 'footer.inc.php';
?>