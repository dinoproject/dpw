<?php 
    session_start();
    require_once 'config.php';

    $id = $_SESSION['id'];
    $result = mysqli_query($con, "SELECT * FROM akun where id_covid_ranger = '$id'");
    $row = mysqli_fetch_array($result);

    $id_ranger = $row['id_covid_ranger'];
    $ranger = mysqli_query($con, "SELECT * FROM covid_ranger where id = '$id_ranger'");
    $rows = mysqli_fetch_array($ranger);

    if( !isset($_SESSION['Login_user']) ) {
        header("Location: login.php");
        exit;
    }


    if( isset($_POST['input'])) {
    	// echo $_POST['nama_lengkap'];
    	// echo $_POST['kasus'];
    	// echo $_POST['provinsi'];
    	if(input_data($_POST) > 0) {
			echo "
			<script>
				alert('Data Berhasil di Tambahkan!');
					document.location.href = 'input_covid.php';
					</script>
			";
		}else {
			echo "
			<script>
				alert('Data gagal di Tambahkan!');
					document.location.href = 'input_covid.php';
					</script>
			";
		}
    }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Input Data COVID-19</title>

 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/app.js"></script>
    <title>EDU - COVID FIRAL</title>
 </head>
 <body>
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
	
<div class="container">
	<h1 class="text-center">INPUT DATA COVID</h1>
<form class="row g-3" method="post">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">ID</label>
    <input type="text" class="form-control" id="inputEmail4" readonly value="<?= $rows['id'] ?>" name="id_ranger">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" id="inputPassword4" name="nama_lengkap" readonly value="<?= $rows['nama_lengkap'] ?>">
  </div>
  <div class="col-md-6">
    <label for="inputState" class="form-label">Kasus</label>
    <select id="inputState" class="form-select" name="kasus">
      <option selected>-- Pilih --</option>
      <option value="Positif">Positif</option>
      <option value="Sembuh">Sembuh</option>
      <option value="Meninggal Dunia">Meninggal Dunia</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputAddress" class="form-label">Jumlah</label>
    <input type="number" class="form-control" id="inputAddress" name="jumlah">
  </div>

  <div class="col-md-6">
  	<?php 
  	$provinsi = mysqli_query($con,"SELECT * FROM provinces");
  	?>
  	<label for="inputState" class="form-label">Provinsi</label>
  	<select name="provinsi" id="provinsi" class="form-select">
  		<option value="" selected>Pilih Provinsi</option>
  		<?php while($row_provinsi = mysqli_fetch_array($provinsi)) { ?>
  			<option value="<?php echo $row_provinsi["id"] ?>"><?php echo $row_provinsi["name"] ?></option>
  		<?php } ?>
  	</select>
  </div>

  <div class="col-md-6">
  	<label for="inputState" class="form-label">Kota</label>
  	<select name="kota" id="kota" class="form-select">
  		<option value="" selected>Pilih Kota</option>
  	</select>
  </div>

  <div class="col-md-6">
  	<label for="inputState" class="form-label">Kecamatan</label>
  	<select name="kecamatan" id="kecamatan" class="form-select">
  		<option value="" selected>Pilih Kecamatan</option>
  	</select>
  </div>

  <div class="col-md-6">
  	<label for="inputState" class="form-label">Kelurahan</label>
  	<select name="kelurahan" id="kelurahan" class="form-select">
  		<option value="" selected>Pilih Kelurahan</option>
  	</select>
  </div>
  <div class="col-12">
  </div>
  <div class="col-12">
  </div>
  <div class="col-12 text-center">
    <button type="submit" class="btn btn-primary" name="input">Submit</button>
  </div>
</form>
</div>

	<footer class="mt-auto fixed-bottom">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">EDU-COVID FIRAL</a>

                <div class="navbar-nav m-auto">
                    <a class="nav-link" aria-current="page" href="#">Github</a>
                    <a class="nav-link" href="/pencegahan.html">Heroku</a>
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
