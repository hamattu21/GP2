<?php
include '../../db/db.php';
session_start();

$post_id = $_GET['post_id'];
$post_id = (int) $post_id;

$rating = $_GET['rating'];
$rating = (int) $rating;

if($post_id == 0 || ($rating < 1 || $rating > 5)){
  header("Location:../MyPost.php", false);
}
else{
  $query = "SELECT d.user_id FROM deals d where d.post_id = ".$post_id." AND d.status = 1";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $ratingFor = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $ratingFor[@count($ratingFor)] = mysqli_fetch_object($result);
      }
  }

  $voter = $_SESSION['id'];
  $for = $ratingFor[0]->user_id;
  $query = "INSERT INTO `rating` (`id`, `voter`, `for`, `rating`, `post_id`) VALUES ('', '$voter', '$for', '$rating', '$post_id');";
  $result = @mysqli_query($connection, $query);
  header("Location:../MyPost.php", false);
}


?>
