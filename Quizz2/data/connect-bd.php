  <?php
  function ConnectBD(){
    $host="localhost";
      try{
    $connect=new PDO("mysql:host=$host; dbname=quizzbd","root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return  $connect;
      }
      catch(PDOException $e)
      {
          die('echec connexion');
      }
  }

  function UserConnect($login, $password){
    $req =ConnectBD();
      $query = "SELECT * FROM utilisateurs WHERE login = :login AND password = :password";
      $statement= $req->prepare($query);
      $statement->bindParam("login", $login, PDO::PARAM_STR);
      $statement->bindParam("password", $password, PDO::PARAM_STR);

      $statement->execute(
        array(
          'login' => $login,
          'password' => $password
        )
      );
      if($statement-> rowCount()>0){
        $user=$statement->fetch(PDO::FETCH_ASSOC);
        $profil=$user['profil'];
        
      }
      if (isset($profil)) {
        if ($profil=='admin') {
          return 'admin';
        }else {
          return 'jeux';
        }
      }else {
        return 'error';
      }

  }
      ?>