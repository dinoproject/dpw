<?php 
    session_start();
    require_once 'config.php';

    $id = $_SESSION['id'];
    $result1 = mysqli_query($con, "SELECT * FROM data_covid where status = 'Sudah Proses' ORDER BY id DESC");


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

                <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-center">Statistik Positif Covid</h2>
                                <div style="width: 800px;margin: 0px auto;">
                                    <canvas id="myChart"></canvas>
                                </div>            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-center">Statistik Sembuh Covid</h2>
                                <div style="width: 800px;margin: 0px auto;">
                                    <canvas id="myChart2"></canvas>
                                </div>            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-center">Statistik Meninggal Covid</h2>
                                <div style="width: 800px;margin: 0px auto;">
                                    <canvas id="myChart3"></canvas>
                                </div>            
                            </div>
                        </div>
                    </div>

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

        <script src="js/Chart.js"></script>

        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Juni 2021", "Juli 2021", "Agustus 2021", "September 2021"],
                    datasets: [{
                        label: '',
                        data: [
                        <?php 
                        $juni = mysqli_query($con,"select * from data_covid where kasus='Positif' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-06%'");
                    // $row = mysqli_fetch_array($juni);
                        $positif = 0;
                        foreach($juni as $row){
                            $positif += $row['jumlah_kasus'];
                        }
                        echo $positif;
                        ?>, 
                        <?php 
                        $juli = mysqli_query($con,"select * from data_covid where kasus='Positif' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-07%'");
                        // echo mysqli_num_rows($juli);
                        $positif = 0;
                        foreach($juli as $row){
                            $positif += $row['jumlah_kasus'];
                        }
                        echo $positif;
                        ?>, 
                        <?php 
                        $agustus = mysqli_query($con,"select * from data_covid where kasus='Positif' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-08%'");
                        // echo mysqli_num_rows($jumlah_fisip);
                        $positif = 0;
                        foreach($agustus as $row){
                            $positif += $row['jumlah_kasus'];
                        }
                        echo $positif;
                        ?>, 
                        <?php 
                        $september = mysqli_query($con,"select * from data_covid where kasus='Positif' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-09%'");
                        // echo mysqli_num_rows($jumlah_pertanian);
                        $positif = 0;
                        foreach($september as $row){
                            $positif += $row['jumlah_kasus'];
                        }
                        echo $positif;
                        ?>
                        ],
                        backgroundColor: [
                        'rgba(255, 162, 132, 0.8)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                        ],
                        borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>

        <script>
            var ctx = document.getElementById("myChart2").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Juni 2021", "Juli 2021", "Agustus 2021", "September 2021"],
                    datasets: [{
                        label: '',
                        data: [
                        <?php 
                        $juni = mysqli_query($con,"select * from data_covid where kasus='Sembuh' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-06%'");
                    // $row = mysqli_fetch_array($juni);
                        $sembuh = 0;
                        foreach($juni as $row){
                            $sembuh += $row['jumlah_kasus'];
                        }
                        echo $sembuh;
                        ?>, 
                        <?php 
                        $juli = mysqli_query($con,"select * from data_covid where kasus='Sembuh' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-07%'");
                        // echo mysqli_num_rows($juli);
                        $sembuh = 0;
                        foreach($juli as $row){
                            $sembuh += $row['jumlah_kasus'];
                        }
                        echo $sembuh;
                        ?>, 
                        <?php 
                        $agustus = mysqli_query($con,"select * from data_covid where kasus='Sembuh' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-08%'");
                        // echo mysqli_num_rows($jumlah_fisip);
                        $sembuh = 0;
                        foreach($agustus as $row){
                            $sembuh += $row['jumlah_kasus'];
                        }
                        echo $sembuh;
                        ?>, 
                        <?php 
                        $september = mysqli_query($con,"select * from data_covid where kasus='Sembuh' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-09%'");
                        // echo mysqli_num_rows($jumlah_pertanian);
                        $sembuh = 0;
                        foreach($september as $row){
                            $sembuh += $row['jumlah_kasus'];
                        }
                        echo $sembuh;
                        ?>
                        ],
                        backgroundColor: [
                        'rgba(100, 162, 132, 0.8)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(100, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                        ],
                        borderColor: [
                        'rgba(100,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(100, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>

        <script>
            var ctx = document.getElementById("myChart3").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Juni 2021", "Juli 2021", "Agustus 2021", "September 2021"],
                    datasets: [{
                        label: '',
                        data: [
                        <?php 
                        $juni = mysqli_query($con,"select * from data_covid where kasus='Meninggal Dunia' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-06%'");
                    // $row = mysqli_fetch_array($juni);
                        $meninggal = 0;
                        foreach($juni as $row){
                            $meninggal += $row['jumlah_kasus'];
                        }
                        echo $meninggal;
                        ?>, 
                        <?php 
                        $juli = mysqli_query($con,"select * from data_covid where kasus='Meninggal Dunia' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-07%'");
                        // echo mysqli_num_rows($juli);
                        $meninggal = 0;
                        foreach($juli as $row){
                            $meninggal += $row['jumlah_kasus'];
                        }
                        echo $meninggal;
                        ?>, 
                        <?php 
                        $agustus = mysqli_query($con,"select * from data_covid where kasus='Meninggal Dunia' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-08%'");
                        // echo mysqli_num_rows($jumlah_fisip);
                        $meninggal = 0;
                        foreach($agustus as $row){
                            $meninggal += $row['jumlah_kasus'];
                        }
                        echo $meninggal;
                        ?>, 
                        <?php 
                        $september = mysqli_query($con,"select * from data_covid where kasus='Meninggal Dunia' and status = 'Sudah Proses' and tanggal_masuk LIKE '2021-09%'");
                        // echo mysqli_num_rows($jumlah_pertanian);
                        $meninggal = 0;
                        foreach($september as $row){
                            $meninggal += $row['jumlah_kasus'];
                        }
                        echo $meninggal;
                        ?>
                        ],
                        backgroundColor: [
                        'rgba(10, 162, 132, 0.8)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(10, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                        ],
                        borderColor: [
                        'rgba(10,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(10, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>
</body>

</html>
