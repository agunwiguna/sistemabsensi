  <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$siswa?></h3>

              <p>Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?=base_url('m/sw')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$guru?></h3>

              <p>Guru</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contact"></i>
            </div>
            <a href="<?=base_url('m/gr')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$info?></h3>

              <p>Info</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-mail"></i>
            </div>
            <a href="<?=base_url('i')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$konsultasi?></h3>

              <p>Konseling</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-list"></i>
            </div>
            <a href="<?=base_url('konsultasi')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
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
              <?php if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='guru') { ?>
                    <div id="map"></div>
              <?php } else {?>
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9987943795018!2d107.5561154140749!3d-6.890746169343179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6bd6aaaaaab%3A0xf843088e2b5bf838!2sSMK+Negeri+11+Bandung!5e0!3m2!1sid!2sid!4v1537250813061" width="600" height="450" frameborder="0" style="border:0;width:1220px;" allowfullscreen></iframe>
              <?php } ?>
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
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpALWzkNO7VH_pCSX30bt43_7h3sIeqQI&libraries=places&callback=initMap" async defer></script>
<script>
  function initMap() {

  var infoWindow = new google.maps.InfoWindow;
  var bounds = new google.maps.LatLngBounds(); 
  
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: {lat: -6.885500, lng: 107.615407},
    mapTypeId: 'roadmap'
  });


    <?php foreach($sw as $data){
        date_default_timezone_set('Asia/Jakarta');
        $nis = $data['nis'];   
        $nama = $data['nama'];
        $alamat = $data['alamat'];
        $waktu = date("d-m-Y h:i:s");
        $lat = $data['lat'];
        $lng = $data['lng'];


       echo ("addMarker($lat, $lng, '<h4>$waktu</h4><hr/>NIS : $nis<br/><br/>Nama : $nama<br/><br/>Alamat : $alamat');\n");                                  
    } ?>

    function addMarker(lat, lng, info) {
      var lokasi = new google.maps.LatLng(lat, lng);
      bounds.extend(lokasi);
      var marker = new google.maps.Marker({
        map: map,
        position: lokasi
      });       
      map.fitBounds(bounds);
      bindInfoWindow(marker, map, infoWindow, info);
    }

  function bindInfoWindow(marker, map, infoWindow, html) {
    google.maps.event.addListener(marker, 'click', function() {
      infoWindow.setContent(html);
      infoWindow.open(map, marker);
    });
  }


}
</script>
   </script>