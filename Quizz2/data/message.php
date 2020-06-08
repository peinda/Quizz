<?php
    include('./connect-bd.php');
    if(isset($_POST['login']) && $_POST['login'] != '' && isset($_POST['password']) && $_POST['password'] != ''){
        
        $login=$_POST['login'];
        $password=$_POST['password'];
        echo UserConnect($login,$password);
    }
    else{
        echo 'pas recu';
    }
?>