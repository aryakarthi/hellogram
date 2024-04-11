<?php

  session_start();
  if(isset($_SESSION['unique_id'])){
    include_once "config.php";

    $sent_id = mysqli_real_escape_string($conn, $_POST['sent_id']);
    $received_id = mysqli_real_escape_string($conn, $_POST['received_id']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    if(!empty($msg)){
      $sql = mysqli_query($conn, "INSERT INTO messages (sent_id,received_id,msg) VALUES ({$sent_id},{$received_id},'{$msg}')") or die();
    }
  }else{
    header("../login.php");
  }

?>