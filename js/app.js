$(document).ready(function() {
  $('#provinsi').change(function() {
    var provinsi_id = $(this).val();
    $.ajax({
      type: 'POST',
      url: 'data_wilayah.php?jenis=kota',
      data: 'province_id='+ provinsi_id,
      success: function(response) {
        $('#kota').html(response);
      }
    });
  })
});

$(document).ready(function() {
  $('#kota').change(function() {
    var kota_id = $(this).val();

    $.ajax({
      type: 'POST',
      url: 'data_wilayah.php?jenis=kecamatan',
      data: 'regency_id='+ kota_id,
      success: function(response) {
        $('#kecamatan').html(response);
      }
    });
  })
});

$(document).ready(function() {
  $('#kecamatan').change(function() {
    var kec_id = $(this).val();

    $.ajax({
      type: 'POST',
      url: 'data_wilayah.php?jenis=kelurahan',
      data: 'district_id='+ kec_id,
      success: function(response) {
        $('#kelurahan').html(response);
      }
    });
  })
});