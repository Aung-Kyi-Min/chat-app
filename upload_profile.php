<?php
include('includes/connection.php');
session_start();
include('includes/header.php');
if (!isset($_SESSION['user_email'])) {
  header("location: sign_in.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account_Setting</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./css/home.css">
<link rel="stylesheet" href="../css/find_people.css">
<style>
  .card{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 400px;
    margin: auto;
    text-align: center;
    font-family: 'Courier New', Courier, monospace;
  }
  .card img{
    height: 200px;
  }
  .title {
    color: gray;
    font-size: 18px;
  }
  button {
    border: none;
    outline: none;
    display: inline-block;
    padding: 9px;
    color: white;
    background: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }
  #update_profile{
    position: absolute;
    cursor: pointer;
    padding: 10px;
    border-radius: 4px;
    color: white;
    background: #000;
  }
  label{
    padding: 7px;
    display: table;
    color: #fff;
  }
  input[type="file"]{
    display: none;
  }
</style>
<body>
  <?php
    $user_email = $_SESSION['user_email'];
    $get_user = "SELECT * FROM users WHERE email = '$user_email'";
    $run_user = mysqli_query($conn, $get_user);
    $row = mysqli_fetch_array($run_user);
    $username = $row['name'];
    $user_profile = $row['user_profile'];
    echo "
    <div class='card'>
      <img src='$user_profile' alt='user_profile'>
      <h1>$username</h1>
      <form action='' method='post' enctype='multipart/form-data'>
        <label id='update_profile'>
          <i class='fa fa-circle-o' aria-hidden='true'></i>
          Select-Profile
          <input type='file' name='u_image' size='60' required>
        </label>
        <button id='button_profile' name='update' > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class='fa fa-heart' aria-hidden='true'></i>Update</button>
      </form>
    </div><br><br>
    ";

    if(isset($_POST['update'])){
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
      $random_number = rand(1,100);
      if($u_image = ''){
        echo "<script>alert('Please Select Profile!!!')</script>";
        echo "<script>window.open('uploade_profile.php','_self')</script>";
        exit();
      } else{
        move_uploaded_file($image_tmp,"images/$u_image.$random_number");
        $query = "UPDATE users SET user_profile = 'images/$u_image.$random_number' WHERE email = '$user_email'";
        $run = mysqli_query($conn,$query);
        if($run){
          echo "<script>alert('Your Profile Uploaded...')</script>";
          echo "<script>window.open('account_setting.php','_self')</script>";
          exit();
        }else {
          echo "<script>alert('Error while updating informatins!')</script>";
          echo "<script>window.open('account_setting.php','_self')</script>";
          exit();
        }
      }
    }

  ?>
</body>
</html>
<?php } ?>