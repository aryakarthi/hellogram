<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">
      <section class="chat-container">
        <header>

          <?php
            include_once "php/config.php";

            $id = mysqli_real_escape_string($conn, $_GET['id']);

            $get_session_query = mysqli_query($conn,"SELECT * FROM users WHERE unique_id = '{$id}'");

            if(mysqli_num_rows($get_session_query) > 0){
              $row = mysqli_fetch_assoc($get_session_query);
            }
          ?>

          <a href="users.php" class="back">
            <i class="fas fa-arrow-left"></i>
          </a>
          <img src="php/uploads/<?php echo $row["image"]; ?>" alt="" />
          <div class="user-info">
            <p><?php echo $row["fname"] . " " . $row["lname"]; ?></p>
            <span><?php echo $row["status"]; ?></span>
          </div>
        </header>

        <div class="chat-box" id="chat-box"></div>

        <form action="#" class="typing-area" id="typing-area" autocomplete="off">

          <input type="text" name="sent_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
          <input type="text" name="received_id" value="<?php echo $id; ?>" hidden>

          <input type="text" name="message" id="msg-input" placeholder="message...">
          <button id="send-btn">
            <i class="fa fa-paper-plane"></i>
          </button>
        </form>
      </section>
    </div>

    <script src="./js/chat.js"></script>
  </body>
</html>
