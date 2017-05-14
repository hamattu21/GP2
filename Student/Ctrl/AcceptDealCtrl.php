<?php

include '../../db/db.php';
session_start();
$errors = array();
if (isset($_POST['Payment'])) {

    $CardHolder = $_POST['CardHolder'];
    $VisaNumber = $_POST['VisaNumber'];
    $CSV = $_POST['CSV'];
    $Year = $_POST['Year'];
    $Month = $_POST['Month'];
    $post_id = $_POST['post_id'];
    $deal_id = $_POST['deal_id'];

    if (!empty($CardHolder) AND !empty($VisaNumber) AND !empty($CSV) AND !empty($Year) AND !empty($Month)) {
        $query = "UPDATE POST P SET P.DEAL_ID = ".$deal_id." WHERE P.ID = ".$post_id;
        $result = @mysqli_query($connection, $query);
        $query = "UPDATE DEALS D SET D.STATUS = 1 WHERE D.ID = ".$deal_id;
        $result = @mysqli_query($connection, $query);
        if ($result) {
            $query = "INSERT INTO `payment` (`id`, `post_id`, `deals_id`, `card_number`, `month`, `year`, `csv`) VALUES ('', '$post_id', '$deal_id', '$CardHolder', '$Month', '$Year', '$CSV');";
            $result = @mysqli_query($connection, $query);
            $_SESSION["success"] = "Accept Deal Successfuly";
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
