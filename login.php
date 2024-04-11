<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">
      <section class="form-container login">
        <h2>hellogram</h2>
        <form action="#">
          <div class="err-msg"></div>

          <div class="input field">
            <input type="text" name="email" placeholder="Email" />
          </div>
          <div class="input field">
            <input type="password" name="password" placeholder="Password" />
            <i class="fas fa-eye"></i>
          </div>
          <div class="field btn">
            <input type="submit" value="Login" />
          </div>
        </form>
        <div class="link">Don't have an account? <a href="index.php">Register</a></div>
      </section>
    </div>

    <script src="./js/password.js"></script>
    <script src="./js/login.js"></script>
  </body>
</html>
