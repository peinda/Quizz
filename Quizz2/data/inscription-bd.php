<?php
$host="localhost";
$username="root";
$password="";
$message="";
//se connecter à mysql
$connect=new PDO("mysql:host=$host; dbname=quizzbd",$username, $password);

//preparation de la requete d'insertion
if(isset($_POST['sub'])){
    if(!empty($_POST['firstname'] && $_POST['lastname'] && $_POST['login'] && $_POST['password'])){
        $target= "../public/image/photos/".basename($_FILES['image']['name']);
        $images= $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
       $query = $connect->prepare('INSERT INTO utilisateurs VALUES (NULL, :prenom, :nom, :login, :password, :profil, :Avatar )');
      //on lie chaque marqueur à une valeur
      $query->bindValue(':prenom',$_POST['firstname'], PDO::PARAM_STR);
      $query->bindValue(':nom',$_POST['lastname'], PDO::PARAM_STR);
      $query->bindValue(':login',$_POST['login'], PDO::PARAM_STR);
      $query->bindValue(':password',$_POST['password'], PDO::PARAM_STR);
      $query->bindValue(':profil','joueur', PDO::PARAM_STR);
      $query->bindValue(':Avatar',$images, PDO::PARAM_STR);
      //execution de la requete preparée
      $insert = $query->execute();
      if ($insert) {
          $message ='bien enregistré';
      }
      else {
          $message='Echec';
      }
    }else{
        $message = 'Remplir tous les champs!';
    }
}
echo $message
// var_dump($_POST['sub']);
?>
