<?php

  while($row = mysqli_fetch_assoc($sql)){

    $sql2 = "SELECT * FROM messages WHERE (received_id = {$row['unique_id']} OR sent_id =  {$row['unique_id']}) AND (sent_id = {$sent_id} OR received_id = {$sent_id}) ORDER BY msg_id DESC LIMIT 1";

    $query2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($query2);

    if(mysqli_num_rows($query2) > 0){
      $result = $row2['msg'];
      ($sent_id == $row2['sent_id']) ? $you = "You: " : $you = "";
    }else{
      $result = "No message available!";
      $you = "";
    }

    (strlen($result) > 28) ? $msg = substr($result,0,28).'...' : $msg = $result;

    ($row['status']=="offline") ? $offline = "offline" : $offline = "";
    

    // if(isset($row2['sent_id'])){
    //   ($sent_id == $row2['sent_id']) ? $you = "You: " : $you = "";
    // }


    $output .= '<a href="chat.php?id=' . $row['unique_id'] .'">
                  <div class="content">
                    <img src="php/uploads/'. $row["image"] .'" alt="" />
                    <div class="user-info">
                      <p>' . $row["fname"] . " " . $row["lname"] . '</p>
                      <span>' . $you . $msg . '</span>
                    </div>
                  </div>
                  <div class="status '. $offline .'">
                    <i class="fas fa-circle"></i>
                  </div>
                </a>';
  }




?>