<?php

include '../../db/db.php';
session_start();
$errors = array();
if (isset($_POST['NewReplay'])) {

    $inbox_id = $_POST['inbox_id'];
    $from = $_SESSION['id'];
    $replay = $_POST['replay'];


    if (!empty($inbox_id) AND !empty($from) AND !empty($replay)) {
        $query = "INSERT INTO `replay` (`id`, `inbox_id`, `from`, `replay`) VALUES (NULL, '$inbox_id', '$from', '$replay')";
        $result = @mysqli_query($connection, $query);
        if ($result) {
            $_SESSION["success"] = "Add Your Replay Successfuly";
            header("Location:../inbox.php", false);
        }
        else {
            $errors[@count($errors)] = "Found error please contact support";
            $_SESSION["errors"] = $errors;
            header("Location:../inbox.php", false);
        }
    }
    else {
        header("Location:../inbox.php", false);
    }
}
else {
    header("Location:../inbox.php", false);
}
?>
