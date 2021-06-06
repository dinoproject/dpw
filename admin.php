<?php 
session_start();
require_once 'config.php';
$result = mysqli_query($con, "SELECT * FROM data_covid where status = 'Sudah Proses' ORDER BY id DESC");
    // $ = mysqli_query($con, "SELECT * FROM ")

if( !isset($_SESSION['Login_admin']) ) {
    header("Location: login.php");
    exit;
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard Firal</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admin.php">FIRAL TEAM</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" /> -->
                <!-- <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>admin</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- LAYOUT SIDE  -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables Covid Ranger
                        </a>
                        <a class="nav-link" href="table_ranger.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>
                            Tables User
                        </a>
                        <a class="nav-link" href="password_admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>
                            Change Password
                        </a>
                    </div>
                </div>
                   <!--  <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        FIRAL TEAM
                    </div> -->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Sembuh Saat ini</div>
                                    
                                    <?php 
                                    $result1 = mysqli_query($con, "SELECT * FROM data_covid where kasus = 'Sembuh' and status = 'Sudah Proses'");
                                    $total = 0;
                                    ?>
                                    <?php foreach($result1 as $row) : ?>
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
                                    <div class="card-body">Meninggal Saat ini</div>
                                    <?php 
                                    $result1 = mysqli_query($con, "SELECT * FROM data_covid where kasus = 'Meninggal Dunia' and status = 'Sudah Proses'");
                                    $total = 0;
                                    ?>
                                    <?php foreach($result1 as $row) : ?>
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
                                    <div class="card-body">Positif Saat ini</div>
                                    <?php 
                                    $result1 = mysqli_query($con, "SELECT * FROM data_covid where kasus = 'Positif' and status = 'Sudah Proses'");
                                    $total = 0;
                                    ?>
                                    <?php foreach($result1 as $row) : ?>
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
                            <h1 class="mt-4">Tables</h1>
                            <ol class="breadcrumb mb-4">
                                <!-- <li class="breadcrumb-item"><a href="admin.html">Dashboard</a></li> -->
                                <li class="breadcrumb-item active">Tables</li>
                            </ol>

                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Data Table Terkonfirmasi
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
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($result as $row) : ?>
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
                                                    <td><?= $row["status"] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </main>

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



                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; FIRAL TEAM 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
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
