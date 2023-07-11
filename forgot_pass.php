<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cafe_forgotPassword</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./css/sign_in.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<body>
  <div class="container">
    <div class="card w-50 mx-auto mt-5">
    <div class="card-header text-center bg-success">
        <h2 class="text-light">Forgot_Password</h2>
        <h4 class="text-light"><i>MyChat</i></h4>
      </div>
      <div class="card-body">
        <form action="" method="post" class="needs-validation" novalidate>
          <div class="mb-3">
            <label for="">Email</label>
            <input type="email" name="email" id="email" class='form-control' placeholder="example@gmail.com" required>
            <div class="invalid-feedback">
              Please Enter your email.
            </div>
          </div>
          <div class="mb-3">
            <label for="">Best Friend's Name</label>
            <input type="text" name="bf" id="bf" class='form-control' placeholder="******" required>
            <div class="invalid-feedback">
              Please Enter your Best friend's name.
            </div>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
          </div>
        </form>
          <div class="text-center small">
            Back to Signin ? <a href="sign_in.php">Click Here</a>
          </div>
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>-->

  <?php
  session_start();
  include('./includes/connection.php');
  if(isset($_POST['submit'])) {
    //echo "aaaa";
    $email = $_POST['email'];
    $bf = $_POST['bf'];
    $query = "SELECT * FROM users WHERE email = '$email' AND forgotten_answer = '$bf'";
    $run = mysqli_query($conn,$query);
    $row = mysqli_num_rows($run);
    var_dump($row);
    if($row == 1){
      $_SESSION['user_email'] = $email;
      echo "<script>window.open('create_password.php','_self')</script>";
    } else {
      echo "<script>alert('Your email or Best friend's name is incorrect...')</script>";
      echo "<script>window.open('forgot_pass.php','_self')</script>";
    }
  }
?>
</body>
</html>