<?php 
	require_once 'config.php';
	$id = json_encode($_POST['id']);
	$result = mysqli_query($con, "SELECT * FROM data_covid where id = $id");
	$row = mysqli_fetch_array($result);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
	<div class="col-md-7">
		<label for="inputPassword4" class="form-label">ID</label>
		<input type="text" class="form-control" id="inputPassword4" name="id" readonly value="<?= $row['id'] ?>">
	</div>
	<div class="col-md-7">
		<label for="inputPassword4" class="form-label">ID Ranger</label>
		<input type="text" class="form-control" id="inputPassword4" name="id_ranger" readonly value="<?= $row['id_covid_ranger'] ?>">
	</div>
	<div class="col-md-7">
		<label for="inputPassword4" class="form-label">Kasus</label>
		<input type="text" class="form-control" id="inputPassword4" name="kasus" readonly value="<?= $row['jumlah_kasus'].' orang '.$row['kasus'] ?>">
	</div>
	<div class="col-md-7">
		<label for="inputPassword4" class="form-label">Daerah</label>
		<input type="text" class="form-control" id="inputPassword4" name="tempat" readonly value="<?= $row['kota']. ' PROVINSI '.$row['provinsi'] ?>">
	</div>
	<h5>Apakah anda ingin menghapus data covid ini?</h5>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>