<?php

include '../../db/db.php';
session_start();
$errors = array();
if (isset($_POST['NewPost'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['id'];

    if (!empty($title) AND !empty($content)) {
        $query = "INSERT INTO `post` (`id`, `title`, `content`, `user_id`) VALUES (NULL, '$title', '$content', '$user_id')";
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
    }
    else {
        header("Location:../NewPost.php", false);
    }
}
else {
    header("Location:../NewPost.php", false);
}
?>
