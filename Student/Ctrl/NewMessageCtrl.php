<?php

include '../../db/db.php';
session_start();
$errors = array();
if (isset($_POST['NewMessage'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $from = $_SESSION['id'];
    $to = $_POST['to'];
    if (!empty($title) AND !empty($content)) {
        $query = "INSERT INTO `inbox` (`id`, `from`, `to`, `title`, `content`) VALUES ('', '$from', '$to', '$title', '$content')";
        $result = @mysqli_query($connection, $query);
        if ($result) {
            $_SESSION["success"] = "Message has been sent Successfuly";
            header("Location:../MyPost.php", false);
        }
        else {
            $errors[@count($errors)] = "Found error please contact support";
            $_SESSION["errors"] = $errors;
            header("Location:../MyPost.php", false);
        }
    }
    else {
        header("Location:../MyPost.php", false);
    }
}
else {
    header("Location:../MyPost.php", false);
}
?>
