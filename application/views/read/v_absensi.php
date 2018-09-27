<link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
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
             <?php if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='guru') {?>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
              </button>
             <?php } ?> 
             <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Input Absensi</h4>
                    </div>
                    <div class="modal-body">
                      <form action="<?=base_url('a/insert')?>" method="post" autocomplete="off" class="form-user">
                        <div class="form-group col-md-6">
                          <label for="waktu">ID RFID</label>
                          <input type="text" class="form-control" name="id_rfid" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="sel1">Keterangan</label>
                          <select class="form-control" id="sel1" name="status" required>
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Alpa">Alpa</option>
                          </select>                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
              <?php if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='guru') {?>
                
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Nama</th> 
                    <th>Kelas</th>             
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach($content as $d){?>               
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$d['nis']?></td>
                    <td><?=$d['nama']?></td>
                    <td><?=$d['nama_kelas']?></td>
                    <td><?=date('d-m-Y', strtotime($d['tanggal']) );?></td>
                    <td><?=date('H:i:s', strtotime($d['waktu']) );?></td>
                    <td><?=$d['status']?></td>
                    <td>
                        <a href="<?=base_url('a/delabsn/'.$d['id_absen']) ?>" class="btn btn-danger btn-sm delete-link">
                          <span class="glyphicon glyphicon-trash"></span> Hapus 
                        </a>
                    </td>
                  </tr>
                  <?php } ?>              
                </tbody>
                <tfoot>
                  <tr>
                   <th>No.</th>
                   <th>NIS</th>
                   <th>Nama</th>
                   <th>Kelas</th>              
                   <th>Tanggal</th>
                   <th>Waktu</th>
                   <th>Keterangan</th>
                   <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
              <?php }else{ ?>
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Nama</th>              
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach($content as $d){?>               
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$d['nis']?></td>
                    <td><?=$d['nama']?></td>
                    <td><?=date('d-m-Y', strtotime($d['tanggal']) );?></td>
                    <td><?=date('H:i:s', strtotime($d['waktu']) );?></td>
                    <td><?=$d['status']?></td>
                  </tr>
                  <?php } ?>              
                </tbody>
                <tfoot>
                  <tr>
                   <th>No.</th>
                   <th>NIS</th>
                   <th>Nama</th>              
                   <th>Tanggal</th>
                   <th>Waktu</th>
                   <th>Status</th>
                  </tr>
                </tfoot>
              </table>
              <?php } ?>
</div>
<!-- /.row -->
</section>
</div>
<!-- /.content -->
<!-- DataTables -->
<script src="<?=base_url()?>assets/back/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/back/dist/swt/sweetalert.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
  jQuery(document).ready(function($){
    $('.delete-link').on('click',function(){
      var getLink = $(this).attr('href');
      swal({
        title: "Apa kamu yakin?",
        text: "Setelah di hapus, data akan hilang permanen!!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "Hapus!",
        cancelButtonText: "Batal !",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          window.location.href = getLink;
        } else {
          swal("Batal", "Data Batal di Hapus :)", "error");
        }
      });
      return false;
    });
  });
</script>
<script>
  //swal tambah berhasil
  <?php if($this->session->userdata('proses')){ ?>
    swal("Berhasil!", "Data Berhasl Tersimpan!", "success")
    <?php
    $this->session->unset_userdata('proses');
  } ?>

   //swal tambah gagal
   <?php if($this->session->userdata('gagal_proses')){ ?>
     swal("Gagal!", "Data Gagal Tersimpan!", "error")
     <?php
     $this->session->unset_userdata('gagal_proses');
   } ?>
</script>   
