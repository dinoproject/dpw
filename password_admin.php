<?php 
    session_start();
    require_once 'config.php';
     $result = mysqli_query($con, "SELECT * FROM akun where username = 'admin'");
     $row = mysqli_fetch_array($result);
    // $ = mysqli_query($con, "SELECT * FROM ")

    if( !isset($_SESSION['Login_admin']) ) {
        header("Location: login.php");
        exit;
    }

    if( isset($_POST['input'])) {
    	if($_POST['old_password'] == $row['password']) {
    		if(change_password($_POST) > 0) {
    			echo "
    			<script>
    			alert('Password Berhasil di Perbarui!');
    			document.location.href = 'admin.php';
    			</script>
    			";
    		}else {
    			echo "
    			<script>
    			alert('Password gagal di perbarui!');
    			document.location.href = 'password_admin.php';
    			</script>
    			";
    		}
    	}else {
			echo "
			<script>
				alert('Password lama yang anda masukkan salah');
					document.location.href = 'password_admin.php';
					</script>
			";
		}
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
        <title>Change Password</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
                   <!--  <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
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
                   <!--  <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        FIRAL TEAM
                    </div> -->
                </nav>
            </div>
            <div id="layoutSidenav_content">
            	<main>
            		<div class="container">
            			<h1 class="text-center">CHANGE PASSWORD</h1>
            			<form class="row g-3" method="post">
            				<div class="col-md-3 offset-md-3">
            					<label for="inputAddress" class="form-label">Old Password</label>
            					<input type="text" class="form-control" id="inputAddress" name="old_password" required>
            				</div>
            				<div class="col-md-8"></div>
            				<div class="col-md-3 offset-md-3">
            					<label for="inputAddress" class="form-label">New Password</label>
            					<input type="text" class="form-control" id="inputAddress" name="new_password" required>
            				</div>
            				<div class="col-md-8"></div>
            				<div class="col-md-3 offset-md-3">
            					<button type="submit" class="btn btn-primary" name="input">Submit</button>
            				</div>
            			</form>
            		</div>
            	</main>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>