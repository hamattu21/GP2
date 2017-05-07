<?php

include '../db/db.php';
session_start();
$errors = array();
if (isset($_POST['Signup'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = @md5($_POST['password']);
    $role = $_POST['role'];


    // validate Email is exists
    $CheckEmail = validateEmail($email);
    if ($CheckEmail) {
        $errors[@count($errors)] = "Email is exists";
    }

    if (@count($errors) == 0) {
        $query = "INSERT INTO `user` (`id`, `full_name`, `email`, `password` , `role`) VALUES (NULL, '$fullname', '$email', '$password' , '$role');";
        $result = @mysqli_query($connection, $query);
        if ($result) {
            $_SESSION["success"] = "Signup successfuly";
            header("Location:../login.php", false);
        } else {
            $errors[@count($errors)] = "Found error please contact support";
            $_SESSION["errors"] = $errors;
            header("Location:../signup.php", false);
        }
    } else {
        $_SESSION["errors"] = $errors;
        header("Location:../signup.php", false);
    }
} else {
    header("Location:../signup.php", false);
}

function validateEmail($Email) {
    include '../db/db.php';
    $query = "SELECT * FROM `user` WHERE `email` = '$Email';";
    $result = @mysqli_query($connection, $query);
    $count = @mysqli_num_rows($result);
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

?>
