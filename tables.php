<?php 
    session_start();
    require_once 'config.php';
     $result = mysqli_query($con, "SELECT * FROM data_covid WHERE status = 'Belum Proses' ORDER BY id DESC");
     $id = "";

    if( !isset($_SESSION['Login_admin']) ) {
        header("Location: login.php");
        exit;
    }

    if( isset($_POST['konfirmasi'])) {
        if(update_data($_POST) <= 0) {
            echo "
            <script>
                alert('Data Gagal di Konfirmasi!');
                    document.location.href = 'tables.php';
                    </script>
            ";
        }else {
            echo "
            <script>
                    document.location.href = 'tables.php';
                    </script>
            ";
        }
    }

    if( isset($_POST['delete'])) {
        if(delete_data($_POST) <= 0) {
            echo "
            <script>
                alert('Data Gagal di Konfirmasi!');
                    document.location.href = 'tables.php';
                    </script>
            ";
        }else {
            echo "
            <script>
                    document.location.href = 'tables.php';
                    </script>
            ";
        }
    }


 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables Firal</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>admin</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout <?= $id; ?></a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- MODAL KONFIRMASI -->
        <div class="modal fade" id="get-data-update" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Data Covid</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form method="post">
                            <div class="modal-body-update">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="konfirmasi">Konfirmasi</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MODAL  -->
            <div class="modal fade" id="get-data-delete" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Data Covid</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form method="post">
                            <div class="modal-body-delete">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables Covid Ranger
                            </a>
                            <a class="nav-link" href="password_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>
                                Change Password
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item"><a href="admin.html">Dashboard</a></li> -->
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Table Konfirmasi
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
                                            <th>Editt</th>
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
                      <td>
            <a  data-toggle="modal" data-id="<?= $row['id']; ?>" class="open-modal-update" href="#"><i class="fas fa-check"></i></a> | <a data-toggle="modal" data-id="<?= $row['id']; ?>" class="open-modal-delete" href="#" title="delete"><i class="fas fa-trash-alt"></i></a>                 </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                



                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; FIRAL TEAM 2021 </div>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/update.js"></script>
        <script src="js/delete.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
