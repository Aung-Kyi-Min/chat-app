<?php
include('includes/connection.php');
session_start();
if(isset($_POST['sign_in'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $selectUser = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
  $check = mysqli_query($conn,$selectUser);
  $c = mysqli_num_rows($check);
  if($c == 1) {
    $_SESSION['user_email'] = $email;
    $update_msg = mysqli_query($conn,"UPDATE `users` SET log_in = 'Online' WHERE email = '$email'");
    $user = $_SESSION['user_email'];
    $get_user = "SELECT * FROM users WHERE email = '$user'";
    $run = mysqli_query($conn,$get_user);
    $row = mysqli_fetch_array($run);
    $user_name = $row['name'];
    echo "<script>window.open('home.php?user_name=$user_name','_self')</script>";
  } else {
    echo "
    <div class = 'alert alert-danger'>
      <strong>Check your email and password.</strong>
    </div>
    ";
  }
}

?>