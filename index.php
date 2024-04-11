<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">
      <section class="form-container register">
        <h2>hellogram</h2>
        <form action="#" enctype="multipart/form-data">
          <div class="err-msg"></div>
          <div class="profile-name">
            <div class="input field">
              <input type="text" name="fname" placeholder="First Name" required />
            </div>
            <div class="input field">
              <input type="text" name="lname" placeholder="Last Name" required />
            </div>
          </div>
          <div class="input field">
            <input type="text" name="email" placeholder="Email" required />
          </div>
          <div class="input field">
            <input type="password" name="password" placeholder="Password" required />
            <i class="fas fa-eye"></i>
          </div>
          <div class="field img-file">
            <label for="">Select Profile Picture</label>
            <input type="file" name="image" required />
          </div>
          <div class="field btn">
            <input type="submit" value="Register" />
          </div>
        </form>
        <div class="link">Already have an account? <a href="login.php">Login</a></div>
      </section>
    </div>

    <script src="./js/password.js"></script>
    <script src="./js/register.js"></script>
  </body>
</html>
