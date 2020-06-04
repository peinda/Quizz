<?php
include_once("./data/inscription-bd.php");
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
            <input type="text" name="firstname" class="firstname">
        </div>
         </div>

        <div class=" row form-group int">
        <div class="col-md-6 col-sm-6 col-lg-6 col-6 ">
            <label for="lastname">last Name</label>
            <input type="text" name="lastname" class="lastname">
        </div>
        </div>
        <div class="row form-group int">
        <div class="col-md-6  col-sm-6 col-lg-6 col-6">
            <label for="login">login</label>
            <input type="text" name="login" class="login">
        </div>
        </div>
        <div class=" row form-group int">
        <div class="col-md-6 col-sm-6 col-lg-6 col-6 ">
         <div class="col-6 col-sm-6  ava"><img id="output"><h3>Avatar</h3></div>
         
        </div>
        </div>
        <div class=" row form-group int">
        <div class="col-md-6 col-sm-6 col-6">
            <label for="password">password</label>
            <input type="password" name="password" class="password">
        </div>
         </div>
        <div class="row form-group int">
        <div class="col-md-6 col-sm-6 col-6 pass2 ">
            <label for="password2">Confirm password</label>
            <input type="password" name="password2" class="password2">
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