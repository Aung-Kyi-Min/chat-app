<?php
include('connection.php');
function searchUser(){
  global $conn;
  if(isset($_GET['search_btn'])){
    $search_query = $_GET['search_query'];
    $get_users = "SELECT * FROM users WHERE name LIKE '%$search_query%' OR township LIKE '%$search_query%' ";
  } else {
    $get_users = "SELECT * FROM users ORDER BY name,township DESC LIMIT 5";
  }
  $run_users = mysqli_query($conn,$get_users);
  while($row = mysqli_fetch_array($run_users)){
    $username = $row['name'];
    $user_profile = $row['user_profile'];
    $township = $row['township'];
    $gender = $row['gender'];

    //Now displaying all at once

    echo "
    <div class='card'>
      <img src='../$user_profile' alt='user_profile'>
      <h1>$username</h1>
      <p class='title'>$township</p>
      <form action='' method='post'>
        <p><button name='add'>Chat with $username</button></p>
      </form>
    </div><br><br>
    ";

    if(isset($_POST['add'])){
      echo "<script>window.open('../home.php?user_name=$username','_self')</script>";
    }
  }
}

?>
