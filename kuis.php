<?php 
    session_start();
    require_once 'config.php';

    $id = $_SESSION['id'];
    $result = mysqli_query($con, "SELECT * FROM akun where id_covid_ranger = '$id'");
    $row = mysqli_fetch_array($result);

    $ranger = mysqli_query($con, "SELECT * FROM covid_ranger ORDER BY kuis DESC LIMIT 10");

    if( !isset($_SESSION['Login_user']) ) {
        header("Location: login.php");
        exit;
    }

    $nilai = 0;
    if( isset($_POST['quiz'])) {
        $p1 = "";
        $p2 = "";
        $p3 = "";
        $p4 = "";
        $p5 = "";
        if(isset($_POST['pertanyaan1'])) {
            $p1 = $_POST['pertanyaan1'];
            if($p1 === "2019") $nilai++;
        }
        if(isset($_POST['pertanyaan2'])) {
            $p2 = $_POST['pertanyaan2'];
            if($p2 === "Wuhan") $nilai++;
        }
        if(isset($_POST['pertanyaan3'])) {
            $p3 = $_POST['pertanyaan3'];
            if($p3 === "14 hari") $nilai++;
        }
        if(isset($_POST['pertanyaan4'])) {
            $p4 = $_POST['pertanyaan4'];
            if($p4 === "Udara") $nilai++;
        }
        if(isset($_POST['pertanyaan5'])) {
            $p5 = $_POST['pertanyaan5'];
            if($p5 === "Telinga") $nilai++;
        }
    }
        $nilai*=20;
        update_nilai_kuis($id, $nilai);

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


    <content>
        <div class="header-parent">
            <div class="header-child">
                <h1>Quiz Covid-19</h1>
                <p style="font-size: 19px;">Pertanyaan-pertanyaan menarik untuk menambah pemahaman tentang covid-19.</p>
            </div>
            <div class="header-child">
                <img src="img/header.jpg" alt="">
            </div>
        </div>

        <!-- <div class="d-flex justify-content-center row"> -->
                <!-- <div class="col-md-10 col-lg-10"> -->

        <div class="container mt-5">
            <div class="d-flex row">
                <div class="col-md-8 col-lg-8">
                    <div class="border">
                        <form method="post">
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row justify-content-between align-items-center mcq">
                                <h4>Covid Quiz</h4>
                                <h4>Nilai anda : <?= $nilai;  ?></h4>
                                <h4 id="shownilai">Nilai anda: <span id="nilainya" name="nilai"></span></h4>
                            </div>
                        </div>
                        <div class="question bg-white p-3 border-bottom">
                            <div class="listpertanyaan" id="pertanyaan1">
                                <div class="d-flex flex-row align-items-center question-title">
                                    <h5 class="mt-1 ml-2">1. Kapan kasus covid-19 terdeteksi di indonesia?</h5>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q1-1" type="radio" name="pertanyaan1" value="2018">
                                        <span>2018</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q1-2" type="radio" name="pertanyaan1" value="2019">
                                        <span>2019</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q1-3" type="radio" name="pertanyaan1" value="2020">
                                        <span>2020</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q1-4" type="radio" name="pertanyaan1" value="2021">
                                        <span>2021</span>
                                    </label>
                                </div>

                            </div>

                            <div class="listpertanyaan" id="pertanyaan2">
                                <div class="d-flex flex-row align-items-center question-title">
                                    <h5 class="mt-1 ml-2">2. Dimana kasus pertama covid-19?</h5>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q2-1" type="radio" name="pertanyaan2" value="Wuhan">
                                        <span>Wuhan</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q2-2" type="radio" name="pertanyaan2" value="Jakarta">
                                        <span>Jakarta</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q2-3" type="radio" name="pertanyaan2" value="Washington">
                                        <span>Washington</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q2-4" type="radio" name="pertanyaan2" value="Amsterdam">
                                        <span>Amsterdam</span>
                                    </label>
                                </div>

                            </div>

                            <div class="listpertanyaan" id="pertanyaan3">
                                <div class="d-flex flex-row align-items-center question-title">
                                    <h5 class="mt-1 ml-2">3. Masa inkubasi COVID-19 selam?</h5>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q3-1" type="radio" name="pertanyaan3" value="7 hari">
                                        <span>7 hari</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q3-2" type="radio" name="pertanyaan3" value="14 hari">
                                        <span>14 hari</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q3-3" type="radio" name="pertanyaan3" value="10 hari">
                                        <span>10 hari</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q3-4" type="radio" name="pertanyaan3" value="12 hari">
                                        <span>12 hari</span>
                                    </label>
                                </div>

                            </div>

                            <div class="listpertanyaan" id="pertanyaan4">
                                <div class="d-flex flex-row align-items-center question-title">
                                    <h5 class="mt-1 ml-2">4. Dibawah ini adalah media penyebaran virus Corona, kecuali?
                                    </h5>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q4-1" type="radio" name="pertanyaan4"
                                            value="Bersalaman/Sentuhan tangan">
                                        <span>Bersalaman/Sentuhan tangan</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q4-2" type="radio" name="pertanyaan4" value="Udara">
                                        <span>Udara</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q4-3" type="radio" name="pertanyaan4"
                                            value="Percikan batuk dan bersin">
                                        <span>Percikan batuk dan bersin</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q4-4" type="radio" name="pertanyaan4" value="Benda-benda Padat">
                                        <span>Benda-benda Padat</span>
                                    </label>
                                </div>

                            </div>

                            <div class="listpertanyaan" id="pertanyaan5">
                                <div class="d-flex flex-row align-items-center question-title">
                                    <h5 class="mt-1 ml-2">5. COVID-19 bisa masuk melalui anggota-anggota tubuh di bawah
                                        ini, kecuali...?</h5>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q5-1" type="radio" name="pertanyaan5" value="Mata">
                                        <span>Mata</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q5-2" type="radio" name="pertanyaan5" value="Hidung">
                                        <span>Hidung</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q5-3" type="radio" name="pertanyaan5" value="Mulut">
                                        <span>Mulut</span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio">
                                        <input id="q5-4" type="radio" name="pertanyaan5" value="Telinga">
                                        <span>Telinga</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                            <button class="btn btn-primary border-success align-items-center btn-success" type="submit" name="quiz" >Submit<i class="fa fa-angle-right ml-2"></i></button>
                        </div>
                    </form>
                    </div>
                </div>
                <!-- kesatu  -->


                <!-- kedua -->
                <div class="col-md-4 col-lg-4">
                    <h5  class="text-center">Berikut ini adalah 10 username nilai tertinggi</h5>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">ID</th>
                          <th scope="col">Username</th>
                          <th scope="col">Nilai</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($ranger as $row) : ?>
                                            <tr>
                                                <td><?= $no;$no++; ?></td>
                                                <td><?= $row["id"] ?></td>
                                                <td><?= $row["username"] ?></td>
                                                <td><?= $row["kuis"] ?></td>
                    </tr>
                    <?php endforeach; ?> 
                  </tbody>
          </table>
      </div>
                <!-- kedua akhir -->
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
    <!-- <script src="js/script1.js"></script> -->
    <!-- <script>
        function quiz1() {
    var nilai = 0;
    if (document.getElementById('q1-2').checked === true) nilai++;
    if (document.getElementById('q2-1').checked === true) nilai++;
    if (document.getElementById('q3-2').checked === true) nilai++;
    if (document.getElementById('q4-2').checked === true) nilai++;
    if (document.getElementById('q5-4').checked === true) nilai++;
    document.getElementById('shownilai').style.display = 'inline';
    document.getElementById('nilainya').innerHTML = nilai * 20;
    var radio1 = document.querySelector('input[type=radio][name=pertanyaan1]:checked');
    var radio2 = document.querySelector('input[type=radio][name=pertanyaan2]:checked');
    var radio3 = document.querySelector('input[type=radio][name=pertanyaan3]:checked');
    var radio4 = document.querySelector('input[type=radio][name=pertanyaan4]:checked');
    var radio5 = document.querySelector('input[type=radio][name=pertanyaan5]:checked');
    radio1.checked = false;
    radio2.checked = false;
    radio3.checked = false;
    radio4.checked = false;
    radio5.checked = false;
}
    </script> -->
</body>

</html>
