
<?php
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/style.css"> 
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <link href="//db.onlinewebfonts.com/c/05289e866fe7e1e99d27a7a31f8d3b66?family=Trattatello" rel="stylesheet" type="text/css"/>

</head>
<body>
<div class="container">
  <div id="imagequiz"><img src="image/imagesquiz.jpg"/></div>
  <form class="form" method="POST" action="" id="form-connect">
    <div class="use">
        <span class="iconify" data-icon="bx:bxs-user" data-inline="false"></span>
        <input type="text" id="username" placeholder="login" error="error1"> 
        <div class="er" id="error1"></div>       
    </div>
    <d class="pass">
        <span class="iconify" data-icon="ri:lock-password-fill" data-inline="false"></span>
        <input type="text" id="password" placeholder="password" error="error2">  
        <div class="er" id="error2"></div> 
        <div class="con">
        <button type="submit" name="connexion">CONNEXION</button>
        <div class="ins"><a href="index.php?lien=insjoueur"><U>S'inscrire pour jouer?</U></a></div>
        </div>
     </div>
  </form>
 </div>
 </body>
 
 