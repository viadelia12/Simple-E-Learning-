<?php

include 'koneksi.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login_admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Input Information</title>
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
            <h3 style="color: white; padding-bottom: 10px;">Praktikum Web IF-B 2022</h3>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid text-center">
    <div class="row">
      <div class="col-sm-12 text-left">
        <h1>Add Announcement</h1>
        <hr>
        <form action="proses_add_information.php" method="POST">
          <label for="name"><b>Date</b></label>
          <input type="date" placeholder="Masukkan Tanggal" name="date" required>
          <br>
          <label for="name"><b>Notes</b></label>
          <input type="text" placeholder="Masukkan Informasi" name="notes" required>

          <div class="clearfix">
            <button name="submit" class="btn btn-success">Add</button>
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