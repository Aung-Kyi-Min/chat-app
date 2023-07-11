<?php
include ('includes/connection.php');
session_start();
include ('includes/header.php');
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
      <?php
      $user_email = $_SESSION['user_email'];
      $get_user = "SELECT * FROM users WHERE email = '$user_email'";
      $run_user = mysqli_query($conn, $get_user);
      $row = mysqli_fetch_array($run_user);
      $id = $row['id'];
      $username = $row['name'];
      $email = $row['email'];
      $user_profile = $row['user_profile'];
      $township = $row['township'];
      $gender = $row['gender'];      
      ?>
      <div class="col-sm-8">
        <form action="" method="post" enctype="multipart/form-data">
          <table class="table table-bordered table-hover">
            <tr class="text-center">
              <td colspan="6" class="active">
                <h2>Change Account Setting</h2>
              </td>
            </tr>
            <tr>
              <td class="text-bold">Change Your Username</td>
              <td>
                <input type="text" name="u_name" id="u_name" class="form-control" value="<?php echo $username; ?>" required>
              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                <a href="upload_profile.php" class="btn btn-default" style="text-decoration: none;font: size 15px;">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  Change Profile
                </a>
              </td>
            </tr>
            <tr>
              <td class="text-bold">Change Your Email</td>
              <td>
                <input type="email" name="u_email" id="u_email" class="form-control" value="<?php echo $email; ?>" required>
              </td>
            </tr>
            <tr>
              <td class="text-bold">TownShip</td>
              <td>
                <select name="u_township" id="u_township" class="form-control">
                  <option value="Insein" <?php if ($township == "Insein") {
                                            echo 'selected="selected"';
                                          }
                                          ?>>Insein</option>
                  <option value="Kamayut" <?php if ($township == "Kamayut") {
                                            echo 'selected="selected"';
                                          }
                                          ?>>Kamayut </option>
                  <option value="Tamwe" <?php if ($township == "Tamwe") {
                                          echo 'selected="selected"';
                                        }
                                        ?>>Tamwe</option>
                  <option value="Sanchaung" <?php if ($township == "Sanchaung") {
                                              echo 'selected="selected"';
                                            }
                                            ?>>Sanchaung</option>
                  <option value="North-Okkalapa" <?php if ($township == "North-Okkalapa") {
                                                    echo 'selected="selected"';
                                                  }
                                                  ?>>North-Okkalapa</option>
                  <option value="Yankin" <?php if ($township == "Yankin") {
                                            echo 'selected="selected"';
                                          }
                                          ?>>Yankin</option>
                  <option value="Mingaladon" <?php if ($township == "Mingaladon") {
                                                echo 'selected="selected"';
                                              }
                                              ?>>Mingaladon</option>
                  <option value="Thaketa" <?php if ($township == "Thaketa") {
                                            echo 'selected="selected"';
                                          }
                                          ?>>Thaketa</option>
                  <option value="Thingangyun" <?php if ($township == "Thingangyun") {
                                                echo 'selected="selected"';
                                              }
                                              ?>>Thingangyun</option>
                  <option value="Kyimyindaing" <?php if ($township == "Kyimyindaing") {
                                                  echo 'selected="selected"';
                                                }
                                                ?>>Kyimyindaing</option>
                  <option value="Kyauktada" <?php if ($township == "Kyauktada") {
                                              echo 'selected="selected"';
                                            }
                                            ?>>Kyauktada</option>
                  <option value="Latha" <?php if ($township == "Latha") {
                                          echo 'selected="selected"';
                                        }
                                        ?>>Latha</option>
                  <option value="Pazundaung" <?php if ($township == "Pazundaung") {
                                                echo 'selected="selected"';
                                              }
                                              ?>>Pazundaung</option>
                  <option value="South-Dagon" <?php if ($township == "South-Dagon") {
                                                echo 'selected="selected"';
                                              }
                                              ?>>South-Dagon</option>
                  <option value="Botataung" <?php if ($township == "Botataung") {
                                              echo 'selected="selected"';
                                            }
                                            ?>>Botataung</option>
                  <option value="Hlaingthaya" <?php if ($township == "Hlaingthaya") {
                                                echo 'selected="selected"';
                                              }
                                              ?>>Hlaingthaya</option>
                  <option value="Hlaing" <?php if ($township == "Hlaing") {
                                            echo 'selected="selected"';
                                          }
                                          ?>>Hlaing</option>
                  <option value="Dala" <?php if ($township == "Dala") {
                                          echo 'selected="selected"';
                                        }
                                        ?>>Dala</option>
                  <option value="Dagon-Seikkan" <?php if ($township == "Dagon-Seikkan") {
                                                  echo 'selected="selected"';
                                                }
                                                ?>>Dagon-Seikkan</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="text-bold">Gender</td>
              <td>
                <label for="gender">Gender : </label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if($gender == 'male') echo 'checked'; ?> required>
                    <label class="form-check-label" for="male">
                      Male
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if($gender == 'female') echo 'checked'; ?> >
                    <label class="form-check-label" for="female">
                      Female
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other" <?php if($gender == 'other') echo 'checked'; ?>>
                    <label class="form-check-label" for="other">
                      Other
                </label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="text-dark">Forgetten Password</td>
              <td>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Forgetten Password</button>
                <div id="myModal" role="dialog" class="modal fade">
                  <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">
                        &times;
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="recovery.php?id=<?php echo $id; ?>" method="post" id="f">
                        <strong>What is your School best friend's name?</strong>
                        <textarea name="content" id="content" cols="50" rows="4" placeholder="Someone" class="form-control bg-light"></textarea><br>
                        <button type="submit" class="btn btn-default" name="sub" > Submit</button>
                        <pre>Answer the above question we will ask you this question if you forgot your <br>Password.</pre><br><br>
                      </form>
                      <?php
                        if(isset($_POST['sub'])){
                          $content = $_POST['content'];
                          if($content == ''){
                            echo "<script>alert('Please Enter Something!')</script>";
                            echo "<script>window.open('account_setting.php','_self')</script>";
                            exit(); 
                          } else {
                            $query = "UPDATE users SET forgotten_answer = '$content' WHERE email = '$user_email'";
                            $run = mysqli_query($conn,$query);
                            if($run){
                              echo "<script>alert('Working')</script>";
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
                    </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                          Close
                        </button>
                      </div>

                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                <a href="change_password.php" class="btn btn-default">
                  <i class="fa fa-key fa-fw" aria-hidden="true"></i>
                  Change Password
                </a>
              </td>
            </tr>
            <tr>
              <td colspan="6">
                <input type="submit" value="Update" name="update" class="btn btn-info">
              </td>
            </tr>
          </table>
        </form>
          <?php
            if(isset($_POST['update'])){
              $user_name = $_POST['u_name'];
              $email = $_POST['u_email'];
              $u_township = $_POST['u_township'];
              $u_gender = $_POST['gender'];
              $update = "UPDATE users SET name ='$user_name' , email = '$email', township= '$u_township' , gender = '$u_gender' WHERE email = '$user_email'";
              $run = mysqli_query($conn,$update);
              if($run){

              }
            }
          ?>
      </div>
      <div class="col-sm-2">
        
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

  </html>
<?php } ?>