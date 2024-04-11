<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    include_once "config.php";

    $sent_id = mysqli_real_escape_string($conn, $_POST['sent_id']);
    $received_id = mysqli_real_escape_string($conn, $_POST['received_id']);

    $output = "";

    $sql = "SELECT * FROM messages
            LEFT JOIN users ON users.unique_id = messages.sent_id
            WHERE (sent_id = {$sent_id} AND received_id = {$received_id}) OR (sent_id = {$received_id} AND received_id = {$sent_id}) ORDER BY msg_id ASC";

    $fetch_chat_query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($fetch_chat_query) > 0){
      while($row = mysqli_fetch_assoc($fetch_chat_query)){
        if($row['sent_id'] === $sent_id){
          $output .= '<div class="chat sent">
                        <div class="content">
                          <p>'. $row['msg'] .'</p>
                        </div>
                      </div>';
        }else{
          $output .= '<div class="chat recieved">
                        <div class="content">
                          <p>'. $row['msg'] .'</p>
                        </div>
                      </div>';

          // $output .= '<div class="chat recieved">
          //               <img src="php/uploads/'. $row['image'] .'" alt="" />
          //               <div class="content">
          //                 <p>'. $row['msg'] .'</p>
          //               </div>
          //             </div>';
        }
      }
      echo $output;
    }
    
  }else{
    header("../login.php");
  }
?>