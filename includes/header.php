<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <a href="" class="navbar-brand " >
      <?php
        $user_email = $_SESSION['user_email'];
        $get_user = "SELECT * FROM users WHERE email = '$user_email'";
        $run_user = mysqli_query($conn,$get_user);
        $row = mysqli_fetch_array($run_user);
        $user_name = $row['name'];
        echo " <a class='navbar-brand' href='../home.php?user_name = $user_name'>MyChat</a>";
      ?>
    </a>
    <ul class="navbar-nav">
      <li>
        <a href="../account_settings.php" style="color: white;text-decoration: none;font-size: 20px;">Setting</a>
      </li>
    </ul>
  </nav><br>