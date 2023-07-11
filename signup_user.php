<?php
include('./includes/connection.php');
if(isset($_POST['sign_up'])){
  $name = $_POST['name'];
  //$email = mysqli_real_escape_string($conn,$_POST['email']);
  $email = $_POST['email'];
  $password = $_POST['password'];
  $township = $_POST['town'];
  $gender = $_POST['gender'];
  $rand = rand(1,2);

  $checkEmail = "SELECT * FROM `users` WHERE email = '$email'";
  $query_run = mysqli_query($conn,$checkEmail);
  $check = mysqli_num_rows($query_run);
  if($check ==1 ) {
    echo "<script>alert('Email has already exist, please try again!')</script>";
    //$_SESSION['sign_up'] = 'Email has already exist, please try again!';
    echo "<script>window.open('sign_up.php','_self')</script>";
    exit();
  }

  if($rand == 1){
    $profile_pic = 'images/profile1.jpg';
  } else if($rand == 2) {
    $profile_pic = 'images/profile2.png';
  }

  $query = "INSERT INTO `users` (`name`,`password`,`email`,`user_profile`,`township`,`gender`) 
            VALUES ('$name','$password','$email','$profile_pic','$township','$gender')";
  $result = mysqli_query($conn,$query);
  if($result) {
    echo "<script>alert('Congratulations ". $name ." , You Have Successfully Registered!')</script>";
    //$_SESSION['register'] = 'Congratulations '. $name .' , You Have Successfully Registered!';
    echo "<script>window.open('sign_in.php','_self')</script>";
  } else {
    //$_SESSION['register'] = 'Registration failed, try again!';
    echo "<script>window.open('sign_up.php','_self')</script>";
  }
}

?>