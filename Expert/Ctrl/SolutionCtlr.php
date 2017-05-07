<?php

include '../../db/db.php';
session_start();
$errors = array();
if (isset($_POST['PostSolution'])) {

    $solution = $_POST['solution'];
    $post_id = $_POST['post_id'];


    if (!empty($solution) AND !empty($post_id)) {
        $query = "INSERT INTO `solution` (`id`, `solution`, `post_id`) VALUES (NULL, '$solution', '$post_id')";
        $result = @mysqli_query($connection, $query);
        if ($result) {
            $_SESSION["success"] = "Add Your Deals Successfuly";
            header("Location:../MyDeals.php", false);
        }
        else {
            $errors[@count($errors)] = "Found error please contact support";
            $_SESSION["errors"] = $errors;
            header("Location:../MyDeals.php", false);
        }
    }
    else {
        header("Location:../MyDeals.php", false);
    }
}
else {
    header("Location:../MyDeals.php", false);
}
?>
