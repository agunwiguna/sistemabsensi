<style>
   /* Set the size of the div element that contains the map */
  #map {
    height: 400px;  /* The height is 400 pixels */
    width: 100%;  /* The width is the width of the web page */
   }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet" />
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Input Data Siswa
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Siswa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Maps</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div id="map"></div>
              </div>  
            </div>
            <!-- /.row -->
          </div>
          <!-- ./box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
     <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Data Siswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?=base_url('m/isw')?>" method="post" autocomplete="off">
              <div class="box-body">
                <div class="form-group col-md-2">
                  <label for="nis">NIS</label>
                  <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukan NIS.." required>
                  <span id="availablity"></span>
                </div>
                <div class="form-group col-md-3">
                  <label for="nama">Nama Siswa</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder=" Masukan Nama.." required>
                </div>
                <div class="form-group col-md-2">
                  <label for="jk">Jenis Kelamin</label>
                  <select class="form-control" name="jk" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>  
                </div>
                <div class="form-group col-md-2">
                  <label for="kontak">Kontak</label>
                  <input type="text" class="form-control" id="kontak" name="kontak" placeholder=" Masukan Kontak.." required>
                </div>
                <div class="form-group col-md-3">
                  <label for="email">E-Mail</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder=" Masukan Email.." required>
                </div>
                <div class="form-group col-md-12">
                  <label for="kontak">Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="Masukan Alamat.." required></textarea>
                </div>
                <div class="form-group col-md-2">
                  <label for="agama">Agama</label>
                  <select class="form-control" name="agama" required>
                    <option value="">-- Pilih --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                  </select>  
                </div>
                <div class="form-group col-md-3">
                  <label for="parent">Nama Orang Tua</label>
                  <input type="text" class="form-control" id="parent" name="parent" placeholder="Masukan Nama.." required>
                </div>
                <div class="form-group col-md-3">
                  <label for="kontak">Kontak Orang Tua</label>
                  <input type="text" class="form-control" id="kontakp" name="kontakp" placeholder="Masukan Kontak.." required>
                </div>
                <div class="form-group col-md-4">
                  <label for="nip">Wali Kelas</label>
                  <select class="form-control" name="nip" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($guru as $g){ ?>
                      <option value="<?=$g['nip']?>"><?=$g['nama_guru']?></option>    
                    <?php } ?>
                  </select>  
                </div>
                <div class="form-group col-md-3">
                  <label for="id_rfid">ID Absensi</label>
                  <input type="text" class="form-control" id="id_rfid" name="id_rfid" placeholder="Masukan ID.." required>
                </div>
                <div class="form-group col-md-3">
                  <label for="id_kelas">Kelas</label>
                  <select class="form-control" name="id_kelas" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($kelas as $k){ ?>
                      <option value="<?=$k['id_kelas']?>"><?=$k['nama_kelas']?></option>    
                    <?php } ?>
                  </select>  
                </div>
                <div class="form-group col-md-3">
                  <label for="lat">Lattitude</label>
                  <input type="text" class="form-control" id="lat" name="lat" placeholder="Drag Marker di atas.." readonly required>
                </div>
                <div class="form-group col-md-3">
                <label for="kontak">Longitude</label>
                  <input type="text" class="form-control" id="lng" name="lng" placeholder="Drag Marker di atas.." readonly required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" onclick="goBack()" class="btn btn-danger">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
  </section>
</div>
<!-- /.content -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY&sensor=false" type="text/javascript"></script>
<script type="text/javascript">
    document.getElementById('reset').onclick= function()
    {
        var field1= document.getElementById('lng');
        var field2= document.getElementById('lat');
        field1.value= field1.defaultValue;
        field2.value= field2.defaultValue;
    };
</script>    
<script type="text/javascript">
    function updateMarkerPosition(latLng) 
    {
      document.getElementById('lat').value = [latLng.lat()];
      document.getElementById('lng').value = [latLng.lng()];
    }

    var myOptions = 
    {
      zoom: 16,
      scaleControl: true,
      center:  new google.maps.LatLng(-6.890710, 107.558304),
      mapTypeId: 'roadmap'
    };
 
    var map = new google.maps.Map(document.getElementById("map"),myOptions);

    var marker1 = new google.maps.Marker({
    position : new google.maps.LatLng(-6.890710, 107.558304),
    title : 'lokasi',
    map : map,
    draggable : true
    });
 
    //updateMarkerPosition(latLng);

    google.maps.event.addListener(marker1, 'drag', function() {
    updateMarkerPosition(marker1.getPosition());
    });
</script>
<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
  $('document').ready(function(){
    $('#nis').change(function(){
     var nis = $(this).val();
     $.ajax ({
      url : "<?=base_url('auth/cekuser')?>",
      method : "POST",
      data :  {nis :nis },
      dataType: "text",
      success:function(html)
      {
        $('#availablity').html(html);
      }
    });
   });
  });
</script> 