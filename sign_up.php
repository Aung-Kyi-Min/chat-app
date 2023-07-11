<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cafe_Sign_in</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./css/sign_in.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<body>
  <div class="container mb-5">
    <div class="card w-50 mx-auto mt-5 mb-5">
      <div class="card-header text-center bg-success">
        <h2 class="text-light">Sign UP</h2>
        <h4 class="text-light"><i>Fill and Start chatting with your friends</i></h4>
      </div>
      <div class="card-body">
        <form action="signup_user.php" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
            <label for="">Username</label>
            <input type="text" name="name" id="name" class='form-control' placeholder="example:Ester" required>
            <div class="invalid-feedback">
              Please Enter a name.
            </div>
          </div>
          <div class="mb-3">
            <label for="">Email</label>
            <input type="email" name="email" id="email" class='form-control' placeholder="example@gmail.com" required>
            <div class="invalid-feedback">
              Please Enter your email.
            </div>
          </div>
          <div class="mb-3">
            <label for="">Password</label>
            <input type="password" name="password" id="password" class='form-control' placeholder="******" required>
            <div class="invalid-feedback">
              Please Enter your password.
            </div>
          </div>
          <div class="mb-3">
            <label for="town">TownShip:</label>
            <select name="town" id="town" class="form-control" required>
            <option value="">Choose TownShip:</option>
              <option value="Insein">Insein</option>
              <option value="Kamayut">Kamayut </option>
              <option value="Tamwe">Tamwe</option>
              <option value="Sanchaung">Sanchaung</option>
              <option value="North-Okkalapa">North-Okkalapa</option>
              <option value="Yankin">Yankin</option>
              <option value="Mingaladon">Mingaladon</option>
              <option value="Thaketa">Thaketa</option>
              <option value="Thingangyun">Thingangyun</option>
              <option value="Kyimyindaing">Kyimyindaing</option>
              <option value="Kyauktada">Kyauktada</option>
              <option value="Latha">Latha</option>
              <option value="Pazundaung">Pazundaung</option>
              <option value="South-Dagon">South-Dagon</option>
              <option value="Botataung">Botataung</option>
              <option value="Hlaingthaya">Hlaingthaya</option>
              <option value="Hlaing">Hlaing</option>
              <option value="Dala">Dala</option>
              <option value="Dagon-Seikkan">Dagon-Seikkan</option>
            </select>
            <div class="invalid-feedback">
              Please select a TownShip.
            </div>
          </div>
          <div class="mb-3" >
            <label for="gender">Gender : </label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
              <label class="form-check-label" for="male">
                Male
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="female" value="female">
              <label class="form-check-label" for="female">
                Female
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="other" value="other">
              <label class="form-check-label" for="other">
                Other
              </label>
            </div>
          </div>
          <div class="mb-3">
            <label for="" class="check-inline">
              <input type="checkbox" required>
              I accept the <a href="" class="text-success">Term of use</a> &amp; <a href="" class="text-success">Privacy and Policy</a>
            </label>
          </div>
          <div class="mb-5">
            Already Have an account ? <a href="sign_in.php" class="text-warning">Click Here</a>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-block" name="sign_up">Sign Up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<script src="./js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
  
  <?php
  if(isset($_SESSION['sign_up'])) {
  echo "<script>
swal({
  title: 'Success',
  text: '".$_SESSION['sign_up']."',
  type: 'success'
}).then(function() {
  // Redirect to another page
  window.location.href = 'sign_in.php';
});
</script>";
  }
?>
</body>
</html>