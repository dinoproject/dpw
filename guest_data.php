<?php 
    session_start();
    require_once 'config.php';

    $result1 = mysqli_query($con, "SELECT * FROM data_covid where status = 'Sudah Proses' ORDER BY id DESC");

 ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/styles.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
                        <a class="nav-link active" aria-current="page" href="guest_index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guest_pencegahan.php">Pencegahan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guest_data.php">Data Statistik</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Guest
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

    <div class="container">
    <main>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Sembuh Saat ini</div>
                                    
                                    <?php 
                                        $result11 = mysqli_query($con, "SELECT * FROM data_covid where kasus = 'Sembuh' and status = 'Sudah Proses'");
                                        $total = 0;
                                    ?>
                                    <?php foreach($result11 as $row) : ?>
                                        <?php 
                                            $total += $row['jumlah_kasus'];
                                         ?>
                                     <?php endforeach; ?>
                                     <div class="card-body"><?= $total; ?> orang</div>
                                    <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total Sembuh Saat ini</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Meninggal saat ini</div>
                                    <?php 
                                        $result11 = mysqli_query($con, "SELECT * FROM data_covid where kasus = 'Meninggal Dunia' and status = 'Sudah Proses'");
                                        $total = 0;
                                    ?>
                                    <?php foreach($result11 as $row) : ?>
                                        <?php 
                                            $total += $row['jumlah_kasus'];
                                         ?>
                                     <?php endforeach; ?>
                                     <div class="card-body"><?= $total; ?> orang</div>
                                    <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total Meninggal</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Positif saat ini</div>
                                    <?php 
                                        $result11 = mysqli_query($con, "SELECT * FROM data_covid where kasus = 'Positif' and status = 'Sudah Proses'");
                                        $total = 0;
                                    ?>
                                    <?php foreach($result11 as $row) : ?>
                                        <?php 
                                            $total += $row['jumlah_kasus'];
                                         ?>
                                     <?php endforeach; ?>
                                     <div class="card-body"><?= $total; ?> orang</div>
                                    <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total Positif sa</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid px-4">
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All table covid ranger
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Kasus</th>
                                            <th>Jumlah</th>
                                            <th>Provinsi</th>
                                            <th>Kota</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Tanggal input</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($result1 as $row) : ?>
                                            <tr>
                                                <td><?= $row["id_covid_ranger"] ?></td>
                                                <td><?= $row["nama"] ?></td>
                                                <td><?= $row["kasus"] ?></td>
                                                <td><?= $row["jumlah_kasus"] ?></td>
                                                <td><?= $row["provinsi"] ?></td>
                                                <td><?= $row["kota"] ?></td>
                                                <td><?= $row["kelurahan"] ?></td>
                                                <td><?= $row["kecamatan"] ?></td>
                                                <td><?= $row["tanggal_masuk"] ?></td>

                                               
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </main>
                </div>
    <!-- <content class="mt-auto">
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


    </content> -->


    <footer>
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

        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>

</html>
