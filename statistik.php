<?php 
    session_start();
    require_once 'config.php';

    $id = $_SESSION['id'];
    $result = mysqli_query($con, "SELECT * FROM akun where id_covid_ranger = '$id'");
    $row = mysqli_fetch_array($result);

    if( !isset($_SESSION['Login_user']) ) {
        header("Location: login.php");
        exit;
    }

 ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>EDU - COVID FIRAL</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">EDU-COVID</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pencegahan.php">Pencegahan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="statistik.php">Data Statistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kuis.php">Kuis</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $row['username']  ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                      <!-- <li><a class="dropdown-item" href="login.php">Ganti Password</a></li> -->
                  </ul>
              </li>
          </ul>
      </div>
            </div>
        </nav>
    </header>


    <content class="mt-auto">
        <div class="header-parent">
            <div class="header-child">
                <h1>Statistik Covid-19</h1>
                <p>Data dan statistik covid-19 pada tanggal 25 Maret 2021.</p>
            </div>
            <div class="header-child">
                <img src="img/stats.jpg" alt="">
            </div>
        </div>

        <div class="header-parent">
            <div class="header-child">
                <img src="img/datacovid.png" alt="">
            </div>
            <div class="header-child">
                <h1>Data Covid-19</h1>
            </div>

        </div>


        <div class="header-parent">
            <div class="header-child">
                <h1>Grafik Covid-19</h1>
            </div>
            <div class="header-child">
                <img src="img/grafikcovid.png" alt="">
            </div>
        </div>


    </content>


    <footer>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">EDU-COVID</a>

                <div class="navbar-nav m-auto">
                    <a class="nav-link" aria-current="page" href="#">Github</a>
                    <a class="nav-link" href="#">Heroku</a>
                </div>

                <div class="navbar-nav ms-auto">
                    <a class="nav-link" aria-current="page" href="#">Copyright Aldin / 1402019011</a>
                </div>
            </div>
        </nav>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

</body>

</html>