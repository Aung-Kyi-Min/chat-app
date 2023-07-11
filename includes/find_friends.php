<?php
include('connection.php');
session_start();
include('find_friends_function.php');
if(!isset($_SESSION['user_email'])){
  header("location: sign_in.php");
}else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find_Friends_Page</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./css/home.css">
<link rel="stylesheet" href="../css/find_people.css">
<body>
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
        <a href="../account_setting.php" style="color: white;text-decoration: none;font-size: 20px;">Setting</a>
      </li>
    </ul>
  </nav><br>
  <div class="row">
    <div class="col-sm-4">
      
    </div>
    <div class="col-sm-4">
      <form action="" class="search_form mb-5">
        <input type="text" name="search_query" id="search_query" placeholder="Search Friends..." autocomplete="off" required>
        <button type="submit" name="search_btn" class="btn btn-dark btn-sm">Search</button>
      </form>
      <?php searchUser(); ?>
    </div>
    <div class="col-sm-4">
      
    </div>
  </div><br><br>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

</body>
</html>
<?php } ?>