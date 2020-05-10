
<?php
    if(isset($_POST['connexion'])) {
        $login=$_POST['login'];
        $pwd=$_POST['pwd'];
        $resultat=connexion($login,$pwd);
        if($resultat=="error"){
            echo "Login ou mot de passe incorrect";
        }else{
            header("location:index.php?lien=".$resultat);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<div class="form">
<form method="POST" action="" id="form-connect">
<div class="cadre">
<div class="texte"><p>Login form</p>
</div>
<div class="taille"> 
    <div class="icone1"><img src="./Icones/ic-login.png"/></div>
    <input type="text"  name="login" placeholder="Login" error="error1"/>
    <div class="er" id="error1"></div>
</div>
<div class=taille1>
    <div class="icone2"><img src="./Icones/icone-password.png"/></div>
    <input type="password" name="pwd" placeholder="Password" error="error2" />
    <div class="er" id="error2"></div>
</div>
<div class="connexion"><input type="submit" name="connexion" value="CONNEXION"/></div>
<div class="ins"><a href="index.php?lien=insjoueur">S'inscrire pour jouer?</a></div>
</div>
</form>
</div>
<script>
const inputs= document.getElementsByTagName("input");
for(input of inputs){
    input.addEventListener("keyup",function(e){
    if(e.target.hasAttribute("error")){
        var idDivError=input.getAttribute("error");
        document.getElementById(idDivError).innerText=""
        }     
        })
}
document.getElementById("form-connect").addEventListener("submit",function(e){
const inputs= document.getElementsByTagName("input");
      var error=false;
      for(input of inputs){
        if(input.hasAttribute("error")){
        var idDivError=input.getAttribute("error");
        if(!input.value){
            document.getElementById(idDivError).innerText="ce champs est obligatoire"
              error=true
          }
      }
    }
    if(error){
        e.preventDefault();
        return false;
    }
  }) 
</script>