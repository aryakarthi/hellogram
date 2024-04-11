<?php

  session_start();
  if(isset($_SESSION['unique_id'])){
    include_once "config.php";

    $id = mysqli_real_escape_string($conn,$_GET['id']);

    if(isset($id)){
      $status = "offline";

      $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$id}");

      if($sql){
        session_unset();
        session_destroy();
        header("location: ../login.php");
      }
    }else{
      header("location: ../users.php");
    }
  }else{
    header("location: ../login.php");
  }
?>