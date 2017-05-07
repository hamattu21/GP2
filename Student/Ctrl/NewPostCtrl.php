<?php

include '../../db/db.php';
session_start();
$errors = array();
if (isset($_POST['NewPost'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['id'];

    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $expensions= array("jpeg","jpg","png");




    if (!empty($title) AND !empty($content)) {
        if(!empty($file_name)){

          if(in_array($file_ext,$expensions)=== false){
             $errors[@count($errors)]="extension not allowed, please choose a JPEG or PNG file.";
          }

          if($file_size > 2097152){
             $errors[@count($errors)]='File size must be excately 2 MB';
          }

          if(@count($errors) == 0){
             move_uploaded_file($file_tmp,"../../img/".$file_name);
          }

        }else{
          $file_name = NULL;
        }

        if(@count($errors) == 0 ){
          $query = "INSERT INTO `post` (`id`, `title`, `content`, `img`, `user_id`) VALUES (NULL, '$title', '$content', '$file_name', '$user_id')";
          $result = @mysqli_query($connection, $query);
          if ($result) {
              $_SESSION["success"] = "Add Your Post Successfuly";
              header("Location:../MyPost.php", false);
          }
          else {
              $errors[@count($errors)] = "Found error please contact support";
              $_SESSION["errors"] = $errors;
              header("Location:../NewPost.php", false);
          }
        }else{
          // Error Images
          header("Location:../NewPost.php", false);
        }
    }
    else {
        header("Location:../NewPost.php", false);
    }
}
else {
    header("Location:../NewPost.php", false);
}
?>
