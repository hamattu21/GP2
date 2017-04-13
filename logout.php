<?php
session_start();
$_SESSION['id'] = false;
session_destroy();

header("Location: login.php" , false);


 ?>
