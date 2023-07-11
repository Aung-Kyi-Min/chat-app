<?php
include('includes/connection.php');
session_start();
if(!isset($_SESSION['user_email'])){
  header("location: sign_in.php");
}else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My_Chat_Home</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--<link rel="stylesheet" href="./css/sign_in.css">-->
<link rel="stylesheet" href="./css/home.css">
<body>
  <div class="main-section">
    <div class="row">
      <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
        <div class="input-group searchbox">
          <div class="input-group-btn">
            <center>
              <a href="./includes/find_friends.php">
                <button type="submit" class="btn btn-default search-icon" name="search_user">
                  Add New User
                </button>
              </a>
            </center>
          </div>
        </div>
        <div class="left-chat">
          <ul>
            <?php include('includes/get_user_datas.php'); ?>
          </ul>
        </div>
      </div>
      <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
        <div class="row">
          <!-- getting user information who login  -->
          <?php
            $email = $_SESSION['user_email'];
            $get_user = "SELECT * FROM users WHERE email = '$email'";
            $run_user = mysqli_query($conn,$get_user);
            $row = mysqli_fetch_array($run_user);
            $user_id = $row['id'];
            $user_name = $row['name'];
            //var_dump($user_name);
          ?>
          <!-- getting user data on which user click -->
          <?php
            if(isset($_GET['user_name'])){
              global $conn;
              $get_username = $_GET['user_name'];
              $get_user = "SELECT * FROM users WHERE name = '$get_username'";
              $run_user = mysqli_query($conn,$get_user); 
              $row_user = mysqli_fetch_array($run_user);
              $username = $row_user['name'];
              $profile_img = $row_user['user_profile'];
              //var_dump($username);
            }
            $total_messages = "SELECT * FROM users_chat WHERE (sender_username = '$user_name' AND receiver_username = '$username') 
                              OR (receiver_username = '$user_name' AND sender_username = '$username') ";
            $run_msg = mysqli_query($conn,$total_messages);
            $total = mysqli_num_rows($run_msg);
          ?>
          <div class="col-md-12 right-header">
            <div class="right-header-img">
              <img src="<?php echo $profile_img ;?>" alt="user_profile_img">
            </div>
            <div class="right-header-detail">
              <form action="" method="post">
                <p><?php echo $username;?></p>
                <span><?php echo $total ; ?></span>&nbsp;&nbsp;
                <button name="logout" class="btn btn-danger">Logout</button>
              </form>
              <?php
                if(isset($_POST['logout'])){
                  $update_msg = mysqli_query($conn,"UPDATE users SET log_in = 'Offline' WHERE name='$user_name'");
                  header("Location:logout.php");
                  exit();
                }
              ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 right-header-contentChat" id="scrolling_to_bottom">
            <?php
              $update_msg = mysqli_query($conn,"UPDATE users_chat SET msg_status = 'read' WHERE sender_username = '$username' AND receiver_username = '$user_name'");
              $sel_msg = "SELECT * FROM users_chat WHERE (sender_username = '$user_name' AND receiver_username = '$username') OR 
                          (receiver_username = '$user_name' AND sender_username = '$username') ORDER BY 1 ASC";
              $run_msg = mysqli_query($conn,$sel_msg);
              while($row = mysqli_fetch_array($run_msg)){
                $sender_username = $row['sender_username'];
                $receiver_username = $row['receiver_username'];
                $msg_content = $row['msg_content'];
                $msg_date = $row['msg_date'];
              ?>
              <ul>
                <?php
                  if($user_name == $sender_username AND $username == $receiver_username){
                    echo "
                      <li>
                        <div class='rightside-right-chat'>
                          <span> $username <small> $msg_date </small> </span><br><br>
                          <p>$msg_content</p>
                        </div>
                      </li>
                    ";
                  } 
                  else if($user_name == $receiver_username AND $username == $sender_username){
                    echo "
                      <li>
                        <div class='rightside-left-chat'>
                          <span> $username <small> $msg_date </small> </span><br><br>
                          <p>$msg_content</p>
                        </div>
                      </li>
                    ";
                    
                  }
                ?>
              </ul>
              <?php
              }
            ?> 
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 right-chat-textbox">
            <form action="" method="post">
              <input type="text" name="msg_content" id="msg_content" placeholder="Write your msessages...." autocomplete="off">
              <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-telegram" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <?php
    if(isset($_POST['submit'])){
      $msg = $_POST['msg_content'];
      if($msg == ''){
        echo "
        <div class='alert alert-danger'>
          <strong><center>Message was unable to send!!!</center></strong>
        </div>
        ";
      } else if(strlen($msg) > 100 ){
        echo "
        <div class='alert alert-danger'>
          <strong><center>Message was unable to send!!!</center></strong>
        </div>
        ";
      } else{
        $insert = "INSERT INTO `users_chat`(`sender_username`,`receiver_username`,`msg_content`,`msg_status`,`msg_date`) 
                  VALUES ('$user_name','$username','$msg','unread', NOW())";
        $run_insert = mysqli_query($conn,$insert);
      }
    }
  ?>

  <script>
    $('#scrolling_to_bottom').animate({
      scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight
    },1000);
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      var height = $(window).height();
      $('.left-chat').css('height', (height -92) + 'px');
      $('.right-header-contentChat').css('height',(height -150) + 'px');
    });
  </script>


</body>
</html>
<?php } ?>