<?php
include('connection.php');
$query = "SELECT * FROM users";
$users = mysqli_query($conn,$query);
while ($row = mysqli_fetch_array($users)){
  $id = $row['id'];
  $name = $row['name'];
  $user_profile = $row['user_profile'];
  $log_in = $row['log_in'];
  echo "
  <li>
    <div class='chat-left-img'>
        <img src='$user_profile' alt='user_profile'>
    </div>
    <div class='chat-left-details'>
      <p><a href='home.php?user_name=$name'>$name</a></p>";
      if($log_in == 'Online'){
        echo "<span><i class='fa fa-circle' aria-hidden='true'></i>Online</span>";
      } else {
        echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i>Offline</span>";
      }
      "
    </div>
  </li>
  ";
}
?>
