<?php
    if(isset($_POST['ins'])) 
    {

      $User=array();
      if($_POST['prenom']!='' && $_POST['nom']!='' && $_POST['login']!='' && $_POST['pwd']!='' && $_POST['pwd1']!='' && $_FILES['avatar']!=''){
       $file=$_FILES['avatar'];
       $prenom=$_POST['prenom'];
       $nom=$_POST['nom'];
       $login=$_POST['login'];
       $pwd=$_POST['pwd'];
       $pwd1=$_POST['pwd1'];
  #Traitement sur l'upload de l'image de profil
       $fileName=$_FILES['avatar']['name'];
       $fileTmpName=$_FILES['avatar']['tmp_name'];
       $fileSize=$_FILES['avatar']['size'];
       $fileError=$_FILES['avatar']['error'];
       $fileType=$_FILES['avatar']['type'];
       $fileExt=explode('.',$fileName);
       $fileActuelExt=strtolower(end($fileExt));
       $allowed= array('jpg','png','jpeg');
  #vérification des logins passwords et sur le téléchargement de l'image de profil
       if(!veriflogin($login) && comp_password($pwd,$pwd1)){
           if(in_array($fileActuelExt,$allowed)){
               if($fileError===0){
                   if($fileSize<2000000){
                       $fileNameNew=$login.".".$fileActuelExt;
                       $fileDestination='./photos/'.$fileNameNew;
                       move_uploaded_file($fileTmpName,$fileDestination);
  #enregistrement des données dans le fichier json
                      $User['prenom']=$prenom;
                      $User['nom']=$nom;
                      $User['login']=$login;
                      $User['pwd']=$pwd;
                      $User['profil']="admin";
                      $User['avatar']=$fileNameNew;
                      $js=file_get_contents("./data/fichier.json");
                      $js=json_decode($js,true);
                      $js[]=$User;
                      $js=json_encode($js);
                      file_put_contents("./data/fichier.json",$js);
                      header("location:index.php");
                   }else{
                       echo "Taille du fichier trés grande";
                   }
  
               }else{
                echo "Erreur de téléchargement !";
               }
  
           }else{
            echo "Type de fichier non pris en charge !";
           }
  
       }else{
           if(veriflogin($login)){
            echo "Ce login existe déja !";
           }
           if(!comp_password($pwd,$pwd1)){
            echo "Passwords dissemblables !";
           }
       }
  
      }
  }
  ?>
<form method="POST" enctype="multipart/form-data" id="ins-connect">
    <div class="div3">
<div class="in"><p><h3>S'INSCRIRE</h3>Pour proposer des quizz</p>    
</div>
<div class="div">
<div class="divleft">
<div class="pre"><p>prenom</p><input type="text" name="prenom" autocomplete="off" placeholder="jojo" error="error3"/></div>
<div class="err" id="error3"></div>
<div class="pre"><p>Nom</p><input type="text" name="nom" autocomplete="off" placeholder="www" error="error4"/></div>
<div class="err" id="error4"></div>
<div class="pre"><p>Login</p><input type="text" name="login" autocomplete="off" placeholder="jow" error="error5"/></div>
<div class="err" id="error5"></div>
<div class="pre"><p>Password</p><input type="password" name="pwd" autocomplete="off" placeholder="........" error="error6"/></div>
<div class="err" id="error6"></div>
<div class="pre"><p>Confirmer Password</p><input type="password" name="pwd1" autocomplete="off" placeholder="........" error="error7"/></div>
<div class="err" id="error7"></div>
<div class="avat">
            <div class="avatar">Avatar</div>
            <div class="choicefichier"> 
            <input type="file" name="avatar" id="tof" class="bouton" onchange="loadFile(event)">
                </div>
            <button type="submit"class="Créecompte" name="ins">Créer compte</button>   
</div>
</div>
</div>
<div  class="divright"><img id="output">
<div class="ad"><h2> Avatar Admin</h2></div></div>
</form>


<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
  };
</script>


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
document.getElementById("ins-connect").addEventListener("submit",function(e){
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
        