<?php
  session_start();
  include_once "config.php";
  $fname = mysqli_real_escape_string($conn,$_POST["fname"]);
  $lname = mysqli_real_escape_string($conn,$_POST["lname"]);
  $email = mysqli_real_escape_string($conn,$_POST["email"]);
  $password = mysqli_real_escape_string($conn,$_POST["password"]);

  if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

      $finduser_query = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");

      if(mysqli_num_rows($finduser_query) > 0){
        echo "$email - Email already exists!";
      }else{

        if(isset($_FILES["image"])){
          $img_name = $_FILES["image"]["name"];
          $img_type = $_FILES["image"]["type"];
          $tmp_name = $_FILES["image"]["tmp_name"];

          $img_explode = explode(".", $img_name);
          $img_ext = end($img_explode);

          $extensions = ["png", "jpg", "jpeg"];
          if(in_array($img_ext, $extensions)){
            $time = time();

            $new_img_name = $time.$img_name;
            
            if(move_uploaded_file($tmp_name,"uploads/".$new_img_name)
            ){
              $status = "online";
              $random_id = rand(time(),10000000);

              $create_user_query = mysqli_query($conn, "INSERT INTO users (unique_id,fname,lname,email,password,image,status) VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");

              if($create_user_query){
                $get_user_query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

                if(mysqli_num_rows($get_user_query) > 0){
                  $row = mysqli_fetch_assoc($get_user_query);
                  $_SESSION["unique_id"] = $row['unique_id'];
                  echo "success";
                }
              }
            }
          }else{
            echo "Please select an image in png, jpg, jpeg";
          }
        }else{
          echo "Please select an image file!";
        }
      }
    }else{
      echo "Invalid Email Address!";
    }
    
  }else{
    echo "All inputs are required!";
  }
?>