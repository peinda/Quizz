<?php ?>
  <div class="row zone-connexion">
    <div class="imagequiz"><img src="public/image/imagesquiz.jpg"/></div>
    <div class="container d-flex align-items-center justify-content-center zone-formulaire">
      <form class="container form" method="POST" action="" id="form-connect">
        <div class="form-group use">
            <span class="iconify" data-icon="bx:bxs-user" data-inline="false"></span>
            <input type="text" id="username" name="login" placeholder="login" error="error1"> 
            <small class="er" id="error1"></small>       
        </div>
        <div class="form-group use">
            <span class="iconify" data-icon="ri:lock-password-fill" data-inline="false"></span>
            <input type="password" id="password" name="password" placeholder="password" error="error2">  
            <small class="er" id="error2"></small>
        </div> 
        <div class="container con">
            <button type="submit" name="connexion">CONNEXION</button>
            <a href="index.php?lien=inscription">S'inscrire pour jouer?</a>
        </div>
      </form>
    </div>
  </div>
<script>



</script>