<?php

include 'koneksi.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
  header("Location: index.php");
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: index.php");
  } else {
    echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login E-Learning</title>
  <link rel="icon" href="assets/images/upn.png" type="image/ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    label {
      font-size: 20px;
    }

    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
      height: 450px
    }

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }

      .row.content {
        height: auto;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="logo_upn.png" style="width: 32px;"></a>
      </div>
      <div>
        <ul class="nav navbar-nav text-center">
          <li>
            <h3 style="color: white; padding-bottom: 10px;">E-Learning</h3>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid text-center">
    <div class="row">
      <div class="col-sm-12 text-left">
        <h1>Login</h1>
        <hr>
        <form action="" method="POST">
          <label for="name"><b>Username</b></label>
          <input type="text" placeholder="Masukkan Username" name="username" required>

          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Masukkan Password" name="password" required>

          <div class="clearfix">
            <button name="submit" class="btn btn-success">Login</button>
          </div>
          <p>
            <a href="register.php">Sign Up</a>
            or
            <a href="login_admin.php">Login as admin?</a>
          </p>
        </form>
      </div>
    </div>
  </div>

  <footer class="container-fluid text-center" style="position: fixed; bottom: 0; width: 100%; height: 50px;">
    <p>&#169; E-Learning 2022</p>
  </footer>

</body>

</html>