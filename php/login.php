<?php
  session_start();
  
  include_once "config.php";
  
  $email = mysqli_real_escape_string($conn,$_POST["email"]);
  $password = mysqli_real_escape_string($conn,$_POST["password"]);

  if(!empty($email) && !empty($password)){

    $find_user_query = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");

    if(mysqli_num_rows($find_user_query) > 0){

      $row = mysqli_fetch_assoc($find_user_query);

      $status = "online";
      $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");

      if($sql){
        $_SESSION["unique_id"] = $row['unique_id'];
        echo "success";
      }
    }else{
      echo "Email/Password is mismatched!";
    }
  }else{
    echo "All inputs are required!";
  }
?>