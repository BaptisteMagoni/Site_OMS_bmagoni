<?php
include_once('data_base.php');

if(isset($_POST['connexion'])){
      $user_name = htmlspecialchars($_POST['users']);
      $password = htmlspecialchars($_POST['password']);

      if(!empty($user_name) AND !empty($password)){
        $requser = $bdd->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $requser->execute(array($user_name, $password));
        $userexist = $requser->rowCount();
        if($userexist == 1){
          $userinfo = $requser->fetch();
          $_SESSION['userinfo'] = $userinfo;
          header('Location: profil.php?id_user='.$_SESSION['userinfo']['id']);
        }
      }
    }
?>