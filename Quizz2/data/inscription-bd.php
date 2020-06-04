<?php
$host="localhost";
$username="root";
$password="";
$message="";
//se connecter à mysql
$connect=new PDO("mysql:host=$host; dbname=quizzbd",$username, $password);

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