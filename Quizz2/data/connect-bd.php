<?php

$host="localhost";
$username="root";
$password="";
$message="";
try{
$connect=new PDO("mysql:host=$host; dbname=quizzbd",$username, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
if(isset($_POST['connexion']))
{
if (empty($_POST['login']) || empty($_POST['password']))
  {
  $message='<label>All field is required</label>';
}
else
  {
  $query = "SELECT * FROM utilisateurs WHERE login = :login AND password = :password";
  $statement=$connect->prepare($query);
  $statement->execute(
    array(
      'login' => $_POST["login"],
      'password' => $_POST["password"]
    )
  );
  $result=$statement->fetch(PDO::FETCH_ASSOC);

  if($result['Profil'] == 'admin') {
    header('location: index.php?lien=accueil');
  }elseif($result['Profil'] == 'joueur') {
    header('location: index.php?lien=jeux');
  }

  $count=$statement->rowCount();
  if($count>0)
  {
    $_SESSION["login"]=$_POST["login"];
  } 
  else
  {
    $message='<label>login or password is wrong</label>';
  }
}
}
}
catch (PDOException $error)
{
$message=$error->getMessage();
}


    ?>