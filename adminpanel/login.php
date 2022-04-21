<?php
session_start();
require '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- ini link css boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
  .main {
    height: 100vh;
    margin: 0 auto;

  }

  .login-box {
    width: 400px;
    height: 250px;
    margin: 0 auto;
    box-sizing: border-box;
    border-radius: 20px;
  }
</style>

<body>

  <!-- ini form login -->

  <div class=" main d-flex justify-conten-center align-items-center">
    <div class="login-box container shadow">
      <div>
        <form action="" method="post">
          <div>
            <label for="username">Username</label>
            <input type="text" name="username" name="username" class="form-control" id="username">
          </div>
          <div>
            <label for="password"> password</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <div>
            <button class="btn btn-success form-control mt-4" type="submit" name="loginbtn">
              login
            </button>
          </div>
        </form>
      </div>

      <!-- feature -->
      <div>
        <?php
        if (isset($_POST['loginbtn'])) {
          $username = htmlspecialchars($_POST["username"]);
          $password = htmlspecialchars($_POST["password"]);

          $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");
          $countdata = mysqli_num_rows($query);
          $data = mysqli_fetch_array($query);
          if ($countdata) {
            if (password_verify($password, $data["password"])) {
              $_SESSION["username"] = $data["username"];
              $_SESSION["login"] = true;
              header("location: ../adminpanel");
            } else {
        ?>
              <div class="alert alert-danger" role="alert">
                password salah
              </div>
            <?php
            }
          } else {
            ?>
            <div class="alert alert-danger" role="alert">
              akun tidak tersedia
            </div>
        <?php
          }
        }
        ?>
      </div>

    </div>

  </div>



</body>


<!-- ini link js nya boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>