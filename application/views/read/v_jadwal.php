<link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Jadwal
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Jadwal</li>
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
                      <h4 class="modal-title">Input Jadwal</h4>
                    </div>
                    <div class="modal-body">
                      <form action="<?=base_url('j/add')?>" method="post" autocomplete="off" class="form-user">
                        <div class="form-group col-md-12">
                          <label for="matpel">Mata Pelajaran</label>
                          <input type="text" class="form-control" name="matpel" placeholder="Masukan Mata Pelajaran.."  required>
                        </div>
                         <div class="form-group col-md-6">
                          <label for="matpel">Guru</label>
                          <select class="form-control" name="nip" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($guru as $g){ ?>
                              <option value="<?=$g['nip']?>"><?=$g['nama_guru']?></option>    
                            <?php } ?>
                          </select> 
                        </div>
                        <div class="form-group col-md-6">
                          <label for="hari">Hari</label>
                          <select class="form-control" name="hari" required>
                            <option value="">-- Pilih --</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jum'at">Jum'at</option>
                            <option value="Sabtu">Sabtu</option>
                          </select> 
                        </div>
                        <div class="form-group col-md-6">
                          <label for="waktu">Waktu</label>
                          <input type="time" class="form-control" name="waktu" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="waktu2">s/d</label>
                          <input type="time" class="form-control" name="waktu2" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="id_kelas">Kelas</label>
                          <select class="form-control" name="id_kelas" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($kelas as $k){ ?>
                              <option value="<?=$k['id_kelas']?>"><?=$k['nama_kelas']?></option>    
                            <?php } ?>
                          </select>  
                        </div>
                        <div class="form-group col-md-4">
                          <label for="tahun">Tahun</label>
                          <input type="text" class="form-control" name="tahun" placeholder="Masukan Tahun.." required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="semester">Semester</label>
                          <select class="form-control" name="semester" required>
                            <option value="">-- Pilih --</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>              
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Guru</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;foreach($content as $d){?>               
                   <tr>
                    <td><?=$no++;?></td>
                    <td><?=$d['matpel']?></td>
                    <td><?=$d['nama_kelas']?></td>
                    <td><?=$d['hari']?></td>
                    <td><?=date('H:i', strtotime($d['waktu']) );?> - <?=date('H:i', strtotime($d['waktu2']) );?></td>
                    <td><?=$d['nama_guru']?></td>
                    <td>
                     <div class="btn-group">
                      <button type="button" class="btn btn-info" style="height:27px;">Pilih</button>
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="height:27px;">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
              <?php if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='guru') {?>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href='#' class='open_modal' id='<?=$d['id_jadwal']?>'>Detail</a>
                        </li>
                        <li>
                          <a href="#" class='open_modals' id='<?=$d['id_jadwal']?>'>Edit</a>
                      </li>
                      <li class="divider"></li>
                      <li><a href="<?=base_url('j/delete/'.$d['id_jadwal']) ?>" class="delete-link">Hapus</a></li>
                    </ul>
              <?php }else{ ?>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href='#' class='open_modal' id='<?=$d['id_jadwal']?>'>Detail</a>
                        </li>
                    </ul>
              <?php } ?> 
                  </div>
                </td>
              </tr>
            <?php } ?>              
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Mata Pelajaran</th>
              <th>Kelas</th>              
              <th>Hari</th>
              <th>Waktu</th>
              <th>Guru</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
         <!-- Modal Detail -->
        <div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        </div>
         <!-- Modal Update -->
        <div id="ModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        </div>
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

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "<?=base_url('j/detail')?>",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#ModalDetail").html(ajaxData);
            $("#ModalDetail").modal('show',{backdrop: 'true'});
           }
         });
        });
      });
</script>

<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modals").click(function(e) {
      var m = $(this).attr("id");
     $.ajax({
          url: "<?=base_url('j/edit')?>",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
            $("#ModalUpdate").html(ajaxData);
            $("#ModalUpdate").modal('show',{backdrop: 'true'});
           }
         });
        });
      });
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

    //swal edit berhasil
    <?php if($this->session->userdata('edit')){ ?>
     swal("Berhasil!", "Data Berhasl di Ubah!", "success")
     <?php
     $this->session->unset_userdata('edit');
   } ?>

    //swal edit gagal
    <?php if($this->session->userdata('gagal_edit')){ ?>
      swal("Gagal!", "Data Gagal di Ubah!", "error")
      <?php
      $this->session->unset_userdata('gagal_edit');
    } ?>

     //swal hapus berhasil
     <?php if($this->session->userdata('delete')){ ?>
      swal("Berhasil!", "Data Berhasl di Hapus!", "success")
      <?php
      $this->session->unset_userdata('delete');
    } ?>

     //swal hapus gagal
     <?php if($this->session->userdata('gagal_delete')){ ?>
       swal("Gagal!", "Data Gagal di Hapus!", "error")
       <?php
       $this->session->unset_userdata('gagal_delete');
     } ?>
</script>