<?php 
  session_start();

  include_once "config.php";

  $sent_id = $_SESSION['unique_id'];

  $sql = mysqli_query($conn,"SELECT * FROM users WHERE NOT unique_id = {$sent_id}");
  $output = "";

  if(mysqli_num_rows($sql) == 1){
    $output .= "No users found!";
  }elseif(mysqli_num_rows($sql) > 0){
    include "data.php"; 
  }
  echo $output;
?>