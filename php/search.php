<?php
  session_start();

  include_once "config.php";

  $sent_id = $_SESSION['unique_id'];

  $search_term = mysqli_real_escape_string($conn, $_POST["searchTerm"]);

  $output = "";

  $sql = mysqli_query($conn,"SELECT * FROM users WHERE NOT unique_id = {$sent_id} AND (fname LIKE '%{$search_term}%' OR lname LIKE '%{$search_term}%')");

  if(mysqli_num_rows($sql) > 0){
      include "data.php";
  }else{
    $output .= "No users found!";
  }
  echo $output;

?>