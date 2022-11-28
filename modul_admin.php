<?php
session_start();

if (isset($_SESSION['username'])) {
  if ($_SESSION['username'] != "admin")
    header("Location: login_admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Input Modul</title>
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
        <a class="navbar-brand" href="#"><img src="logo_upn.png" style="width: 25px;"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="module_admin.php">Modul</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid text-center">
    <div class="row">
      <div class="col-sm-12 text-left">
        <h1><img src="modul.png" style="width: 40px;"> Input Modul</h1>
        <hr>
        <form method="POST" action="add_modul.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="formFile" class="form-label">Input Modul</label>
            <input class="form-control" type="file" id="formFile" name="file">
          </div>

          <label for="name"><b>Description</b></label>
          <input type="text" placeholder="Masukkan Deskripsi" name="deskripsi" required>

          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Masukkan Password" name="password" required>

          <div class="clearfix">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="container-fluid text-center" style="position: fixed; bottom: 0; width: 100%; height: 50px;">
    <p>&#169; E-Learning 2022</p>
  </footer>

</body>

</html>