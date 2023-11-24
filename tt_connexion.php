<?php
  session_start(); // Pour les messages
  
 
  
  $email =  htmlentities($_POST['email']);
  $password = htmlentities($_POST['password']);
  
  // Connexion :
  require_once("param.inc.php");
  $mysqli = new mysqli($host, $login, $passwd, $dbname);
  if ($mysqli->connect_error) {
      die('Erreur de connexion (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
  }

  
  
  if ($stmt = $mysqli->prepare("SELECT * FROM user WHERE email=? limit 1")) 
  {
   
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();   

    if($result->num_rows > 0) 
    {     
        $row = $result->fetch_assoc(); 
            if (password_verify($password,$row["passwd"])) 
            {
                  // Redirection vers la page admin.php ou autres pages en fonction du role (tuteur,admin, etc.);
                  $_SESSION['PROFILE']=$row;
                //$_SESSION['message'] = "Authentification réussi pour un role inconnu.";
                if($row["role"]==2){
                  
                  $_SESSION['message'] = "Bienvenue ". $_SESSION['PROFILE']['nom_de_avatar'];
                 
                  header('Location: accueil.php');
                }
                else
                {
                $_SESSION['message'] = "Bienvenue ". $_SESSION['PROFILE']['nom_de_avatar'];

                header('Location: admin.php');
              }          
            
              }else { 
                // Redirection vers la page d'authentification connexion.php
              $_SESSION['message'] = "Erreur de connexion";
                header('Location: connexion.php');
                
              }    
        
    }else{
        
      $_SESSION['message'] = "Erreur de connexion";
         header('Location: connexion.php');
        }
    }

?>
