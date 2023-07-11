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
<body>
  <div class="row">
    <div class="col-sm-2">

    </div>
    <div class="col-sm-8">
      <form action="" method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-hover">
          <tr class="text-center">
            <td colspan="6" class="active">
              <h2>Change Password</h2>
            </td>
          </tr>
          <tr>
            <td class="text-bold">Current Password</td>
            <td>
              <input type="password" name="curr_password" id="mypass" class="form-control" placeholder="Current Password" required>
            </td>
          </tr>
          <tr>
            <td class="text-bold">New Password</td>
            <td>
              <input type="password" name="u_pass1" id="mypass" class="form-control" placeholder="New Password" required>
            </td>
          </tr>
          <tr>
            <td class="text-bold">Confirm Password</td>
            <td>
              <input type="password" name="u_pass2" id="mypass" class="form-control" placeholder="Confirm Password" required>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" value="Change" class="btn btn-info" name="change">
            </td>
          </tr>
        </table>
      </form>
      <?php
        if(isset($_POST['change'])){
          $curr_pass = $_POST['curr_password'];
          $u_pass1 = $_POST['u_pass1'];
          $u_pass2 = $_POST['u_pass2'];
          $user_email = $_SESSION['user_email'];
          $get_user = "SELECT * FROM users WHERE email = '$user_email'";
          $run_user = mysqli_query($conn, $get_user);
          $row = mysqli_fetch_array($run_user);
          $password = $row['password'];
          if($curr_pass !== $password) {
            echo "
              <div class='alert alert-danger'>
                <strong>Your Old Password didn't match!!!</strong>
              </div>
            ";
          }
          if($u_pass1 !== $u_pass2) {
            echo "
              <div class='alert alert-danger'>
                <strong>Your Password didn't match with Current Password!!!</strong>
              </div>
            ";
          }
          if($u_pass1 <= 8 && $u_pass2 <= 8) {
            echo "
              <div class='alert alert-danger'>
                <strong>Use 8 or more than 8 characters!!!</strong>
              </div>
            ";
          }
          if($u_pass1 == $u_pass2  && $curr_pass == $password) {
            $query = "UPDATE users SET password = '$u_pass1' WHERE email = '$user_email'";
            $run = mysqli_query($conn,$query);
            echo "
              <div class='alert alert-success'>
                <strong>Your Password changed successfully...</strong>
              </div>
            ";
          }
        }
      ?>
    </div>
    <div class="col-sm-2">

    </div>
  </div>
</body>
</html>
<?php } ?>