<?php

include '../../db/db.php';
session_start();
$errors = array();
if (isset($_POST['NewDeal'])) {

    $comment = $_POST['comment'];
    $amount = $_POST['amount'];
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['id'];


    if (!empty($comment) AND !empty($amount)) {
        $query = "INSERT INTO `deals` (`id`, `post_id`, `user_id`, `amount`, `status`, `comment`) VALUES (NULL, '$post_id', '$user_id', '$amount', '0', '$comment')";
        $result = @mysqli_query($connection, $query);
        if ($result) {
            $_SESSION["success"] = "Add Your Deals Successfuly";
            header("Location:../Posts.php", false);
        }
        else {
            $errors[@count($errors)] = "Found error please contact support";
            $_SESSION["errors"] = $errors;
            header("Location:../Posts.php", false);
        }
    }
    else {
        header("Location:../Posts.php", false);
    }
}
else {
    header("Location:../Posts.php", false);
}
?>
