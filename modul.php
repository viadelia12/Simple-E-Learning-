<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>E-Learning</title>
  <link rel="icon" href="assets/images/upn.png" type="image/ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
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
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="modul.php">Modul</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid text-center" style="margin: 20px">
    <table>
      <thead>
        <tr>
          <td width="5%"><strong>No</strong></td>
          <td width="20%"><strong>Nama File Sumber</strong></td>
          <td width="20%"><strong>Nama File Enkripsi</strong></td>
          <td width="20%"><strong>Path File</strong></td>
          <td width="25%"><strong>Aksi</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 1;
          $query = mysqli_query($conn, "SELECT * FROM modul");
          while ($data = mysqli_fetch_array($query)) { 
        ?>
        <tr>
          <td>
            <?php echo $i; ?>
          </td>
          <td>
            <?php echo $data['file_name_source']; ?>
          </td>
          <td>
            <?php echo $data['file_name_finish']; ?>
          </td>
          <td>
            <?php echo $data['file_url']; ?>
          </td>
          <td>
            <?php
                  if ($data['status'] == 1) {
                        ?><a href=dekripsi_file.php?id_file=<?php echo $data['id_file'];
              ?>><button>Dekripsi</button></a>
            <?php
                  } else if ($data['status'] == 2) {
                        ?><a href=modul_admin.php><button>Enkripsi</button></a>
            <?php
                  } ?>
          </td>
        </tr>
        <?php
                  $i++;
                } ?>
      </tbody>
    </table>
  </div>

  <footer class="container-fluid text-center" style="position: fixed; bottom: 0; width: 100%; height: 50px;">
    <p>&#169; E-Learning 2022</p>
  </footer>

</body>

</html>