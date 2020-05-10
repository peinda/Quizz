<?php
//traitement fichier json
function getData($file="fichier"){
    $data=file_get_contents("./data/".$file.".json");
    $data=json_decode($data,true);
    return $data;
}
function comp_password($pwd,$pwd1){
  if($pwd==$pwd1){
      return true; 
  }
  return false;
}
    function connexion($login, $pwd){
        $users=getData();
        foreach ($users as $key => $user){
          if($user["login"]===$login && $user["pwd"]===$pwd){
            $_SESSION['user']=$user;
            $_SESSION['statut']="login";
            if($user["profil"]=="admin"){
              return "accueil";
            }else{
              return "jeux"; 
            }
          }    
      }
      return "error";
    }
        function is_connect(){
        if(!isset($_SESSION['statut'])){
            header("location:index.php");
        }            
        }  
        
  function deconnexion(){
    unset($_SESSION['user']);
    unset($_SESSION['statut']);
    session_destroy();
}
  function veriflogin($login){
    $users=getData();
    foreach($users as $user){
  if ($user["login"]===$login) {
    return true;
  }
  }
  return false;
  }
// inscription admin
function ins_admin_to_json ($login){
  $json_data= file_get_contents('./data/fichier.json');
  $decode_flux= json_decode($json_data, true);
  $error='';
  $success='';
  $test=veriflogin($_POST['login']);
  if ($test) {
    echo  "login existe deja <br>";
  }else{
      if ($_POST['pwd']!= $_POST['pwd1']){
        $error='Les mot de passe doivent etre identiques' ;
      }else{
          $data= array(
            "prenom"=>$_POST["prenom"],
              "nom"=> $_POST["nom"],
              "login"=> $_POST["login"],
              "pwd"=>$_POST["pwd"],
              "image"=>$_FILES['avatar']['name'],
              "profil"=>"admin"
          );
      }
  }
if (!empty($error)){
  echo '<span id="msg" style="color: red">'.$error.'</span>';
}
//recuparation de l'image pour le placer dans un repertoire du projet
if(!empty($_FILES)){
  $file_name= $_FILES['avatar']['name'];
  $file_extention= strrchr($file_name, ".");

  $file_tmp_name= $_FILES['avatar']['tmp_name'];
  $file_dest= "./photos/".$file_name;

  $extentions_autorisees= array('.jpg', '.jpeg', '.png');
  if(in_array($file_extention, $extentions_autorisees)){
      if(move_uploaded_file($file_tmp_name, $file_dest)){
          echo "avatar envoyé <br>";
      }else{
          echo "Une erreur est survenue lors de l'envoi du fichier";
      }
  }else{
      echo "Seuls les fichiers PNG et JPG sont autorisées";
  }
}
  if(in_array($file_extention, $extentions_autorisees)){
      if(move_uploaded_file($file_tmp_name, $file_dest)){
          echo "avatar envoyé <br>";
      }else{
          echo "Une erreur est survenue lors de l'envoi du fichier";
      }
  }else{
      echo "Seuls les fichiers PNG et JPG sont autorisées";
  }

}
//inscription joueur
function ins_joueur_to_json ($login){
  $json_data= file_get_contents('./data/fichier.json');
  $decode_flux= json_decode($json_data, true);
  $error='';
  $success='';
  $test=veriflogin($_POST['login']);
  if ($test) {
    echo  "login existe deja <br>";
  }else{
      if ($_POST['pwd']!= $_POST['pwd1']){
        $error='Les mot de passe doivent etre identiques' ;
      }else{
          $data= array(
            "prenom"=>$_POST["prenom"],
              "nom"=> $_POST["nom"],
              "login"=> $_POST["login"],
              "pwd"=>$_POST["pwd"],
              "image"=>$_FILES['avatar']['name'],
              "profil"=>"joueur"
          );
      }
  }
if (!empty($error)){
  echo '<span id="msg" style="color: red">'.$error.'</span>';
}
//recuparation de l'image pour le placer dans un repertoire du projet
if(!empty($_FILES)){
  $file_name= $_FILES['avatar']['name'];
  $file_extention= strrchr($file_name, ".");

  $file_tmp_name= $_FILES['avatar']['tmp_name'];
  $file_dest= "./photos/".$file_name;

  $extentions_autorisees= array('.jpg', '.jpeg', '.png');
  if(in_array($file_extention, $extentions_autorisees)){
      if(move_uploaded_file($file_tmp_name, $file_dest)){
          echo "avatar envoyé <br>";
      }else{
          echo "Une erreur est survenue lors de l'envoi du fichier";
      }
  }else{
      echo "Seuls les fichiers PNG et JPG sont autorisées";
  }
}
  if(in_array($file_extention, $extentions_autorisees)){
      if(move_uploaded_file($file_tmp_name, $file_dest)){
          echo "avatar envoyé <br>";
      }else{
          echo "Une erreur est survenue lors de l'envoi du fichier";
      }
  }else{
      echo "Seuls les fichiers PNG et JPG sont autorisées";
  }

}
//



?>