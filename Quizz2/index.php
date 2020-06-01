<?php 
  
  session_start();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="public/css/style.css">
   <link href="//db.onlinewebfonts.com/c/05289e866fe7e1e99d27a7a31f8d3b66?family=Trattatello" rel="stylesheet" type="text/css"/>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,800&display=swap" rel="stylesheet">
  <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
  <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
  
   <title>Quizz</title>
</head>
<body background="image/background_1.png">
  <img class="image" src="image/logo-QuizzSA.png"/>
  <div class="container d-flex justify-content-center zone-texte">
    <h2>Le plaisir de jouer</h2>
  </div>
  <div class="container d-flex align-items-center justify-content-center zone-affichage">
  <?php 

require_once('./data/connect-bd.php');

    if (isset($_GET['lien'])){
      switch($_GET['lien']){
        case "accueil":
            require_once('./pages/admin.php');
        break;
        case "jeux":
            require_once('./pages/jeux.php');
        break;
        case "inscription":
            require_once('./pages/inscription.php');
        break;
        case "afficheJeu":
            require_once('./pages/pageJeu.php');
        break;
      }
      }else {
        if (isset($_GET['statut']) && $_GET['statut']==="logout") {
          deconnexion();
        }
      require_once('./pages/connexion.php');
    }
  ?>
  </div>
</body>
</html>