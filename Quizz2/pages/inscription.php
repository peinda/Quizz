<?php

$host="localhost";
$username="root";
$password="";
$message="";
//se connecter à mysql
$connect=new PDO("mysql:host=$host; dbname=quizz_bd",$username, $password);

//preparation de la requete d'insertion
if(isset($_POST['sub'])){

  $target= "./image/photos/".basename($_FILES['image']['name']);
  $images= $_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], $target);
 $query = $connect->prepare('INSERT INTO utilisateurs VALUES (NULL, :Prenom, :Nom, :login, :password, :Profil, :Avatar )');
//on lie chaque marqueur à une valeur
$query->bindValue(':Prenom',$_POST['firstname'], PDO::PARAM_STR);
$query->bindValue(':Nom',$_POST['lastname'], PDO::PARAM_STR);
$query->bindValue(':login',$_POST['login'], PDO::PARAM_STR);
$query->bindValue(':password',$_POST['password'], PDO::PARAM_STR);
$query->bindValue(':Profil','joueur', PDO::PARAM_STR);
$query->bindValue(':Avatar',$images, PDO::PARAM_STR);
//execution de la requete preparée
$insert = $query->execute();
if ($insert) {
    $message ='bien enregistré';
}
else {
    $message='Echec';
}
}

?>
<div class="row zone-connexion">
    <div class="container d-flex align-items-center justify-content-center zone-formulaire">
      <form class="form" method="POST" action="" id="form-login" enctype="multipart/form-data">
        <div class="container zone-texteCon">
            <h3>S'inscrire</h3>
            <p>pour tester vos connaissances</p>
        </div>
        <div class="row">  
         <div class="row form-group int">
            <div class="col-md-6 col-sm-6 col-lg-6 col-6">
            <label for="firstname" >first Name</label>
            <input type="text" name="firstname" class="firstname" id="firstname" error=error1>
            <small class="er" id="error1"></small>       

        </div>
         </div>

        <div class=" row form-group int">
        <div class="col-md-6 col-sm-6 col-lg-6 col-6 ">
            <label for="lastname">last Name</label>
            <input type="text" name="lastname" class="lastname" id="lastname" error=error2>
            <small class="er" id="error2"></small>       

        </div>
        </div>
        <div class="row form-group int">
        <div class="col-md-6  col-sm-6 col-lg-6 col-6">
            <label for="login">login</label>
            <input type="text" name="login" class="login" id="login" error=error3>
            <small class="er" id="error3"></small>       

        </div>
        </div>
        <div class=" row form-group int">
        <div class="col-md-6 col-sm-6 col-lg-6 col-6 ">
         <div class="col-6 col-sm-6  ava"><img id="output" error=error4><h3>Avatar</h3></div>
         <small class="er" id="error4"></small>       

         
        </div>
        </div>
        <div class=" row form-group int">
        <div class="col-md-6 col-sm-6 col-6">
            <label for="password">password</label>
            <input type="password" name="password" class="password" id="password" error=error5>
            <small class="er" id="error5"></small>       

        </div>
         </div>
        <div class="row form-group int">
        <div class="col-md-6 col-sm-6 col-6 pass2 ">
            <label for="password2">Confirm password</label>
            <input type="password" name="password2" class="password2" id="password2" error=error6>
            <small class="er" id="error6"></small>       

        </div>
        </div>
        <div class=" row fichier">
            <label for="file" class="label-file">Choisir un fichier</label>
            <input id="file" class="choisir" type="file" name="image" onchange="loadFile(event)">    

        </div>
        <button type="submit" class="btn btn-primary" id="sub" name="sub">SUBMIT</button>
    </div>
 </form>
 </div>
 </div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
  };
</script>


