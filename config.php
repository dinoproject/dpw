<?php 
	$con = mysqli_connect("localhost","root","","dpw_project");

 function query($query) {
	global $con;
	$result = mysqli_query($con, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}




function insert_data($data) {
	global $con;

	$username = $data['username'];
	$password = $data['password'];
	$nama_ranger = $data["nama_ranger"];
	$jenis_kelamin = $data["gender"];
	$email = $data["email"];
	$no_hp = $data["no_hp"];
	$alamat = $data["alamat"];
	$provinsi = $data["provinsi"];
	$kota = $data["kota"];
	$kecamatan = $data["kecamatan"];
	$kelurahan = $data["kelurahan"];
	$no_nik = $data["no_nik"];
	$tanggal_lahir = new DateTime($data["tanggal_lahir"]);
	$tempat_lahir = $data["tempat_lahir"];
	$tanggal_daftar = new DateTime();
	$difference = $tanggal_daftar->diff($tanggal_lahir);
	$tanggal_lahir = $tanggal_lahir->format('Y-m-d');
	$tanggal_daftar = $tanggal_daftar->format('Y-m-d');
	$usia = $difference->y;
	$d = mysqli_query($con, "SELECT * FROM provinces where id = $provinsi");
	$e = mysqli_query($con, "SELECT * FROM regencies where id = $kota");
	$f = mysqli_query($con, "SELECT * FROM districts where id = $kecamatan");
	$g = mysqli_query($con, "SELECT * FROM villages where id = $kelurahan");
	$result = mysqli_fetch_array($d);
	$result1 = mysqli_fetch_array($e);
	$result2 = mysqli_fetch_array($f);
	$result3 = mysqli_fetch_array($g);
	$provinsi = $result["name"];
	$kota = $result1["name"];
	$kecamatan = $result2["name"];
	$kelurahan = $result3["name"];

	$akun = mysqli_query($con, "SELECT * FROM covid_ranger order by id DESC LIMIT 1");
	$row_akun = mysqli_fetch_array($akun);

	$id_ranger_akun = $row_akun['id'] +1;

	$query1 = "INSERT INTO akun values ('', '$username', '$password', '$email
	', 'user', '$id_ranger_akun')";
	mysqli_query($con,$query1);


	$query = "INSERT INTO covid_ranger values
	('', '$nama_ranger','$jenis_kelamin','$email', '$no_hp', '$alamat', '$provinsi','$kota','$kecamatan','$kelurahan','$no_nik','$usia', '$tempat_lahir','$tanggal_lahir',0,'$username')";

	mysqli_query($con,$query);
	return mysqli_affected_rows($con);
}

function input_data($data) {
	global $con;

	$id_ranger = $data['id_ranger'];
	$nama = $data['nama_lengkap'];
	$kasus = $data['kasus'];
	$jumlah = $data['jumlah'];
	$provinsi = $data['provinsi'];
	$kota = $data['kota'];
	$kelurahan = $data['kelurahan'];
	$kecamatan = $data['kecamatan'];
	$d = mysqli_query($con, "SELECT * FROM provinces where id = $provinsi");
	$e = mysqli_query($con, "SELECT * FROM regencies where id = $kota");
	$f = mysqli_query($con, "SELECT * FROM districts where id = $kecamatan");
	$g = mysqli_query($con, "SELECT * FROM villages where id = $kelurahan");
	$result = mysqli_fetch_array($d);
	$result1 = mysqli_fetch_array($e);
	$result2 = mysqli_fetch_array($f);
	$result3 = mysqli_fetch_array($g);
	$provinsi = $result["name"];
	$kota = $result1["name"];
	$kecamatan = $result2["name"];
	$kelurahan = $result3["name"];
	$tanggal_daftar = new DateTime();
	$tanggal_daftar = $tanggal_daftar->format('Y-m-d');

	$query = "INSERT INTO data_covid values ('','$id_ranger', '$nama', '$kasus',
	'$jumlah', '$provinsi', '$kota', '$kelurahan', '$kecamatan', '$tanggal_daftar', 'Belum Proses')";

	mysqli_query($con, $query);
	return mysqli_affected_rows($con);
}

function change_password($data) {
	global $con;

	$username = 'admin';
	$password_old = $data['old_password'];
	$password_new = $data['new_password'];

	$query = "UPDATE akun set password = '$password_new' where username = '$username'";
	mysqli_query($con, $query);
	return mysqli_affected_rows($con);
}


function update_data($data) {
	global $con;

	$id = $data['id'];
	$query = "UPDATE data_covid set status = 'Sudah Proses' where id = $id";
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

function update_nilai_kuis($id, $nilai) {
	global $con;

	$query = mysqli_query($con, "SELECT * FROM covid_ranger where id = $id");
	$row = mysqli_fetch_array($query);

	if($nilai > $row['kuis']) {
		$queryy = "UPDATE covid_ranger set kuis = $nilai where id = $id";
    	mysqli_query($con, $queryy);
	}
}


function delete_data($data) {
	global $con;

	$id = $data['id'];
	$query = "DELETE FROM data_covid where id = $id";
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

?>
