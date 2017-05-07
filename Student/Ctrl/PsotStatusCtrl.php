<?php
  include '../../db/db.php';
  session_start();
  $deal_id = $_GET['deal_id'];
  $deal_id = (int) $deal_id;

  $status = $_GET['status'];
  $status = (int) $status;

  $post_id = $_GET['post_id'];
  $post_id = (int) $post_id;



  if($deal_id == 0 || $status == 0){
    header("Location:../MyPost.php", false);
  }


  if($status == 1){
    header("Location:../MyPost.php", false);
  }else{
    $query = "UPDATE deals d SET d.status = 2 WHERE d.id = ".$deal_id;
  }
  $result = @mysqli_query($connection, $query);
  if($result){
    header("Location:../MyPost.php", false);
  }

?>
