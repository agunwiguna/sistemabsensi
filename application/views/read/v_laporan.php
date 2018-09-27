<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Absensi
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Absensi</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- /.box -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3> 
            <!-- /.box-header -->
            <div class="box-body">
              <div id="print-area-2" class="print-area">
            <form action="<?=base_url('a/v')?>" method="post" class="form-horizontal">
              <h4 align="center">DAFTAR HADIR SISWA</h4>
              <h4 align="center">SMKN 11 BANDUNG</h4>
              <h4 align="center">TAHUN AJARAN <?php echo date('Y') ?></h4>
              <br/>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Mata Pelajaran</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="matpel" required>
                      <option value="">-- Pilih --</option>
                        <?php foreach ($jadwal as $j){ ?>
                            <option value="<?=$j['matpel']?>"><?=$j['matpel']?></option>    
                        <?php } ?>   
                    </select> 
                  </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="nama_kelas" required>
                      <option value="">-- Pilih --</option>
                      <?php foreach ($kelas as $k){ ?>
                            <option value="<?=$k['nama_kelas']?>"><?=$k['nama_kelas']?></option>    
                        <?php } ?>  
                    </select> 
                  </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Pertemuan</label>
                  <div class="col-sm-3">
                     <input type="date" class="form-control" id="tanggal" name="tanggal">
                  </div>
              </div>
              <button type="submit" class="btn btn-danger btn-md">
                <span class="glyphicon glyphicon-print"></span> Print
              </button>
        </form>
</div>
<!-- /.row -->
</section>
</div>
<!-- /.content -->



