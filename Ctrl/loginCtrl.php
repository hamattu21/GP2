<?php

include '../db/db.php';
session_start();
$errors = array();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) AND !empty($password)){
      $password = @md5($password);
      $query = "select * from `user` where `email` = '$username' AND `password` = '$password' limit 1";
      $result = @mysqli_query($connection, $query);
      $count = mysqli_num_rows($result);
      if($count > 0){
        $user[@count($user)] = mysqli_fetch_object($result);
        $_SESSION['id'] = $user[0]->id;
        $_SESSION['role'] = $user[0]->role;
        $_SESSION['name'] = $user[0]->full_name;

        if($user[0]->role == 1){
          header("Location: ../Admin/index.php" , false);
        }
        else if($user[0]->role == 2){
          header("Location: ../Teacher/index.php" , false);
        }
        else if($user[0]->role == 3){
          header("Location: ../Expert/index.php" , false);
        }
        else if($user[0]->role == 4){
          header("Location: ../Student/index.php" , false);
        }
      }
      else{
        $errors[@count($errors)] = "username or password incorrect";
        $_SESSION["errors"] = $errors;
        header("Location: ../login.php" , false);
      }
    }
    else{
      header("Location: ../login.php", false);
    }
}
else {
    header("Location: ../login.php", false);
}


?>
