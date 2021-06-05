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
                        <a class="nav-link" href="input_covid.php">Input Data</a>
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


    <content class="container">
        <div class="header-parent">
            <div class="header-child">
                <h1>Pencegahan Covid-19</h1>
                <p>Gerakan 5M adalah modal awal yang dibutuhkan agar pandemi COVID-19 bisa cepat usai. Yuk, ketahui dan
                    praktikkan 5M pencegahan COVID-19 mulai sekarang!.</p>
            </div>
            <div class="header-child">
                <img src="img/pencegahan.png" alt="">
            </div>
        </div>

        <h2 class="title-content">Gerakan 5M</h2>
        <div class="card-group">
            <div class="card" style="width: 18rem;">
                <img src="img/masker.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Memakai Masker</h5>
                    <p class="card-text">Anda diharapkan untuk memakai masker saat berada di luar rumah, atau ketika
                        berkumpul bersama kerabat di mana pun berada.</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/kuis.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Menjaga Jarak</h5>
                    <p class="card-text">Jika ada keperluan mendesak yang membuat Anda harus pergi ke luar rumah,
                        ingatlah untuk menjaga jarak satu sama lain. Jarak yang dianjurkan adalah 1 hingga 2 meter dari
                        orang sekitar Anda.</p>

                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/cucitangan.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mencuci Tangan</h5>
                    <p class="card-text">Anda mesti mencuci tangan menggunakan air mengalir dan sabun secara berkala.
                        Jika tak ada air dan sabun, Anda bisa menggunakan hand sanitizer untuk membersihkan tangan dari
                        kuman-kuman yang menempel.</p>

                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/temp.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Menjauhi Kerumunan</h5>
                    <p class="card-text">Anda juga diminta untuk menjauhi kerumunan saat berada di luar rumah. Ingat,
                        semakin banyak dan sering Anda bertemu orang, kemungkinan terinfeksi corona bisa semakin tinggi.
                    </p>

                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/sneezing.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mengurangi Mobilitas</h5>
                    <p class="card-text">Jika tidak ada keperluan yang mendesak, tetaplah berada di rumah. Meski sehat
                        dan tidak ada gejala penyakit, belum tentu Anda pulang ke rumah dengan keadaan yang masih sama.
                    </p>

                </div>
            </div>

        </div>



    </content>


    <footer class="mt-auto">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">EDU-COVID</a>

                <div class="navbar-nav m-auto">
                    <a class="nav-link" aria-current="page" href="#">Github</a>
                    <a class="nav-link" href="#">Heroku</a>
                </div>

                <div class="navbar-nav ms-auto">
                    <a class="nav-link" aria-current="page" href="#">Copyright FIRAL TEAM</a>
                </div>
            </div>
        </nav>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

</body>

</html>
