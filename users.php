<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">
      <section class="users">
        <header>
          <?php
            include_once "php/config.php";
            $get_session_query = mysqli_query($conn,"SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");

            if(mysqli_num_rows($get_session_query) > 0){
              $row = mysqli_fetch_assoc($get_session_query);
            }
          ?>
          <div class="content">
            <img src="php/uploads/<?php echo $row["image"]; ?>" alt="" />
            <div class="user-info">
              <p><?php echo $row["fname"] . " " . $row["lname"]; ?></p>
              <span><?php echo $row["status"]; ?></span>
            </div>
          </div>
          <a href="php/logout.php?id=<?php echo $row['unique_id'] ?>" class="logout">
            <i class="fas fa-sign-out"></i>
          </a>
        </header>
        <div class="search">
          <span class="tip">Select an user to chat</span>
          <input type="text" id="search-bar" placeholder="Enter name to search" />
          <button id="search-btn">
            <i class="fas fa-search"></i>
          </button>
        </div>
        <div class="user-list" id="user-list">
          
        </div>
      </section>
    </div>

    <script src="./js/users.js"></script>
  </body>
</html>
