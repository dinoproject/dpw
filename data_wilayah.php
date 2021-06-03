<?php 
require_once 'config.php';
switch ($_GET['jenis']) {
  case 'kota':
  $province_id = $_POST['province_id'];
  $sql_kota = mysqli_query($con, "SELECT * FROM regencies where province_id = $province_id");

  echo '<option>Pilih Kota</option>';
  while($row_kota = mysqli_fetch_array($sql_kota)) {
    echo '<option value="'.$row_kota['id'].'">'.$row_kota['name'].'</option>';
  }break;

    case 'kecamatan':
    $regency_id = $_POST['regency_id'];
    $sql_kec = mysqli_query($con, "SELECT * FROM districts where regency_id = $regency_id");

    echo '<option>Pilih Kecamatan</option>';
    while($row_kec = mysqli_fetch_array($sql_kec)) {
      echo '<option value="'.$row_kec['id'].'">'.$row_kec['name'].'</option>';
    }break;

    case 'kelurahan':
    $district_id = $_POST['district_id'];
    $sql_kel = mysqli_query($con, "SELECT * FROM villages where district_id = $district_id");

    echo '<option>Pilih Kelurahan</option>';
    while($row_kel = mysqli_fetch_array($sql_kel)) {
      echo '<option value="'.$row_kel['id'].'">'.$row_kel['name'].'</option>';
    }break;
}