<?php 
require 'config.php';
	if(isset($_POST["register"])) {
		if(insert_data($_POST) > 0) {
			echo "
			<script>
				alert('Data Berhasil di Tambahkan!');
					document.location.href = 'login.php';
					</script>
			";
		}else {
			echo "
			<script>
				alert('Data gagal di Tambahkan!');
					document.location.href = 'pendaftaran.php';
					</script>
			";
		}
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pendaftaran Covid Ranger</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style11.css"/>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/app.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="#" method="post" id="myform">
				<div class="form-left">
					<h2>Covid Ranger</h2>
					<!-- <div class="form-row">
						<select name="title">
						    <option class="option" value="Pasien Umum" name="jenis_pasien">Pasien Umum</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div> -->
					<div class="form-row">
						<input type="text" name="nama_ranger" id="nama_ranger" placeholder="Nama Lengkap" class="input-text" autocomplete="off" required>
					</div>
					<div class="form-row">
						<input type="text" name="username" id="username" placeholder="Username" class="input-text" autocomplete="off" required>
					</div>
					<div class="form-row">
						<input type="password" name="password" id="password" placeholder="Password" class="input-text" autocomplete="off" required>
					</div>
					<div class="form-row">
							<input type="number" name="no_hp" class="phone" id="no_hp" placeholder="Nomor Handphone(+62)" required>
					</div>
					<div class="form-row">
						<select name="gender">
						    <option class="option" value="Jenis Kelamin">Jenis Kelamin</option>
						    <option class="option" value="Pria">Pria</option>
						    <option class="option" value="Wanita">Wanita</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-row">
						<input type="text" name="email" id="email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Email" autocomplete="off">
					</div>
					<h5 style="margin-left:70px;margin-top:10px; font-size: 15px;">Tanggal Lahir</h5>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="date" name="tanggal_lahir" id="tempat_lahir" class="input-text" placeholder="Tanggal lahir" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="tempat_lahir" id="tempat_lahir" class="input-text" placeholder="Tempat Lahir" required autocomplete="off">
						</div>
					</div>

					<!-- <div class="form-row">
						<select name="agama">
						    <option class="option" value="Agama">Agama</option>
						    <option class="option" value="Islam">Islam</option>
						    <option class="option" value="Kristen">Kristen</option>
						    <option class="option" value="Katolik">Katolik</option>
						    <option class="option" value="Hindu">Hindu</option>
						    <option class="option" value="Buddha">Buddha</option>
						    <option class="option" value="Konghucu">Konghucu</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div> -->
					<!-- <div class="form-row">
						<select name="status">
						    <option class="option" value="Status Pernikahan">Status Pernikahan</option>
						    <option class="option" value="Menikah">Menikah</option>
						    <option class="option" value="Belum Menikah">Belum Menikah</option>
						    <option class="option" value="Janda">Janda</option>
						    <option class="option" value="Duda">Duda</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div> -->
					<!-- <div class="form-row">
						<select name="pendidikan">
						    <option class="option" value="Pendidikan">Pendidikan</option>
						    <option class="option" value="SD">SD</option>
						    <option class="option" value="SMP">SMP</option>
						    <option class="option" value="SMA">SMA/SMK</option>
						    <option class="option" value="Diploma 3">Diploma 3</option>
						    <option class="option" value="Diploma 4">Diploma 4</option>
						    <option class="option" value="Strata 1">Strata 1</option>
						    <option class="option" value="Strata 2">Strata 2</option>
						    <option class="option" value="Strata 3">Strata 3</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div> -->
					<!-- <div class="form-row">
						<select name="pembayaran">
						    <option class="option" value="Cara Pembayaran">Cara Pembayaran</option>
						    <option class="option" value="BPJS">BPJS</option>
						    <option class="option" value="Mandiri">Umum/Mandiri</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div> -->
					<!-- <div class="form-row">
						<input type="text" name="pekerjaan" id="pekerjaan" class="input-text" placeholder="Pekerjaan" required autocomplete="off">
					</div> -->
				</div>
				<div class="form-right">
					<h2>Contact Details</h2>
					<div class="form-row">
						<input type="number" name="no_nik" id="no_nik" placeholder="No NIK" class="input-text" required autocomplete="off">
					</div>
					<div class="form-row">
						<input type="text" name="alamat" class="alamat" id="alamat" placeholder="Alamat" required autocomplete="off">
					</div>
					<div class="form-row">
						<?php 
							$provinsi = mysqli_query($con,"SELECT * FROM provinces");

						 ?>
						<select name="provinsi" id="provinsi">
							<option value="">Provinsi</option>
							<?php while($row_provinsi = mysqli_fetch_array($provinsi)) { ?>
							<option value="<?php echo $row_provinsi["id"] ?>"><?php echo $row_provinsi["name"] ?></option>
							<?php } ?>
						</select>
						<span class="select-btn">
							<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
						<div class="form-row">
							<select name="kota" id="kota">
						    <option value="">Pilih Kota</option>
						    <option></option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
						</div>
					<div class="form-row">
							<select name="kecamatan" id="kecamatan">
						    <option value="">Pilih Kecamatan</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
						</div>
						<div class="form-row">
							<select name="kelurahan" id="kelurahan">
						    <option value="">Pilih Kelurahan</option>
						    <option></option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
						</div>
				<!-- 	<div class="form-row">
						<select name="kewarganegaraan">
						    <option class="option" value="Kewarganegaraan">Kewarganegaraan</option>
						    <option class="option" value="WNA">WNA</option>
						    <option class="option" value="WNI">WNI</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div> -->
					
					
					<div class="form-checkbox">
						<label class="container"><p>Saya menerima syarat dan ketentuan yang berlaku.</p>
						  	<input type="checkbox" name="checkbox">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" id="register" class="register" value="Register">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
