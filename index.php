<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mini_Projet</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body background="images/img-bg.jpg">
    <div class="corps">
    <img src="images/logo-QuizzSA.png"/>
    <div class="entete">Le plaisir de jouer</div>
    </div>
     <div>
     <?php 
        
      require_once('./traitement/fonctionQuizz.php');
    if (isset($_GET['lien']))
    {
      switch($_GET['lien']){
        case "accueil":
            require_once('./pages/pageAdmin.php');
        break;
        case "jeux":
            require_once('./pages/pageJoueur.php');
        break;
        case "insjoueur":
            require_once('./pages/insJoueur.php');
        break;
        case "afficheJeu":
            require_once('./pages/afficheJeu.php');
        break;
      }
    }else 
    {    
        if (isset($_GET['statut']) && $_GET['statut']==="logout") {
          deconnexion();
        }
      require_once('./pages/connexion.php');
    }
      ?>
    </div>
    </body>
    </html>