
  <?php  
    session_start();
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="public/css/style.css">
    <link href="//db.onlinewebfonts.com/c/05289e866fe7e1e99d27a7a31f8d3b66?family=Trattatello" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,800&display=swap" rel="stylesheet">    
    <title>Quizz</title>
  </head>
  <body background="./public/image/background_1.png">
    <img class="image" src=" ./public/image/logo-QuizzSA.png"/>
    <div class="container d-flex justify-content-center zone-texte">
      <h2>Le plaisir de jouer</h2>
    </div>
    <div class="container d-flex align-items-center justify-content-center zone-affichage">
    <?php 
    if(isset($_GET['user'])){
      if($_GET['user'] == 'admin'){
        require_once('./pages/admin.php');
      }
      elseif($_GET['user'] == 'joueur'){
        require_once('./pages/jeux.php');
      }
      elseif($_GET['user'] == 'inscription'){
        require_once('./pages/inscription.php');
      }
    }else{
      require_once ('./pages/connexion.php');
    }
      
  
  require_once ('./traitements/fonctions.php');
  require_once ('./data/connect-bd.php');
  
    ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="./public/js/script.js"></script>
  </body>
  </html>

  

  