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
                        <?= $row['username'] ?>
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


    <content>
        <div class="header-parent">
            <div class="header-child">
                <h1>Edukasi Covid-19</h1>
                <p>Website ini bertujuan
                    memberikan edukasi kesehatan kepada masyarakat tentang virus COVID-19 dan bagaimana
                    pencegahan penyebarannya.</p>
            </div>
            <div class="header-child">
                <img src="img/header.jpg" alt="">
            </div>
        </div>

        <div class="header-parent">
            <div class="header-child">
                <img src="img/mask.jpg" alt="">
            </div>
            <div class="header-child">
                <h1>Apa itu Covid-19?</h1>
                <p>COVID-19 adalah penyakit yang disebabkan oleh virus severe acute respiratory syndrome coronavirus 2
                    (SARS-CoV-2). COVID-19 dapat menyebabkan gangguan sistem pernapasan, mulai dari gejala yang ringan
                    seperti flu, hingga infeksi paru-paru, seperti pneumonia.</p>
            </div>
        </div>


        <div class="card-group">
            <div class="card" style="width: 18rem;">
                <img src="img/pencegahan.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Pencegahan</h5>
                    <p class="card-text">Beberapa Informasi untuk pencegahan penyebaran covid-19.</p>
                    <a href="pencegahan.html" class="btn btn-primary">Learn More</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/data.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Statistik</h5>
                    <p class="card-text">Data-Data tentang covid-19 dan statistiknya untuk tanggal 25 Maret 2021.</p>
                    <a href="statistik.html" class="btn btn-primary">Learn More</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/kuis.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Kuis</h5>
                    <p class="card-text">Kuis untuk mencoba seberapa kenal kamu dengan covid-19 ini.</p>
                    <a href="kuis.html" class="btn btn-primary">Learn More</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/contact.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Contact</h5>
                    <p class="card-text">Jika ada pertanyaan yang ingin diajukan, Anda bisa bertanya kepada kami.</p>
                    <a href="kontak.html" class="btn btn-primary">Learn More</a>
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
                    <a class="nav-link" href="/pencegahan.html">Heroku</a>
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
